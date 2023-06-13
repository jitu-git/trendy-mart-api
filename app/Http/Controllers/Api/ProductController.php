<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;

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

}
