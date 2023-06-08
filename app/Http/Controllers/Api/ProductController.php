<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

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

}
