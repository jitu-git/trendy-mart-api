<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Favourite;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller {

  public function categories() {

    $categories = Category::with(['children'])->where('status', 1)
      ->select('id', 'name', 'image')
      ->whereNull('parent_id')->get();
    return response()->json([
      'status' => true,
      'message' => 'Categories list',
      'data' => $categories
    ]);
  }

  public function filterData() {
    $sizes = Size::active()->get();
    $colors = Color::active()->get();
    $brands = Brand::active()->get();

    return response()->json([
      'status' => true,
      'message' => 'Categories list',
      'data' => [
        'sizes' => $sizes, 
        'colors' => $colors, 
        'brands' => $brands
      ]
    ]);
  }

  public function products(Request $request) {
    $query = Product::with('category', 'colors', 'sizes', 'images', 'isMyFav')->where('status', 1);
    if($request->has('category_id')){
      $query->where('category_id', $request->get('category_id'));
    }
    if($request->has('colors')){
      $query->whereHas('colors', function($q) use ($request) {
        $q->whereIn('color_id', $request->get('colors'));
      });
    }
    if($request->has('sizes')){
      $query->whereHas('sizes', function($q) use ($request) {
        $q->whereIn('size_id', $request->get('sizes'));
      });
    }
    if($request->has('price')){
      ///$q->whereIn('size_id', $request->get('sizes'));
    }
    $data = $query->paginate(10);
    return response()->json([
      'status' => true,
      'message' => 'Prodcut fetch successfully',
      'data' => $data
    ]);
  }

  public function productDetails(Product $product) {
    $product->load('category', 'colors', 'sizes', 'images', 'isMyFav');
    return response()->json([
      'status' => true,
      'message' => 'Prodcut fetch successfully',
      'data' => $product
    ]);
  }

  public function handleFavourite(Request $request, Product $product) {
    $type = $request->get('type');
    $data = ['user_id' => get_user_info('id'), 'product_id' => $product->id];
    if($type == 'add') {
      $res = Favourite::create($data);
    } else if($type == 'remove') {
      $res = Favourite::where($data)->delete();
    } else {
      return response()->json([
        'status' => false,
        'message' => 'Invalid request',
      ]);
    }
    if($res) {
      return response()->json([
        'status' => true,
        'message' => '',
      ]);
    } else {
      return response()->json([
        'status' => false,
        'message' => 'Something went wrong',
      ]);
    }
  }
}
