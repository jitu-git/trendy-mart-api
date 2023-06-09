<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('categories', [ProductController::class, 'categories']);
    Route::get('filters', [ProductController::class, 'filterData']);
    Route::get('products', [ProductController::class, 'products']);
    Route::get('product/{product}', [ProductController::class, 'productDetails']);
    Route::get('new-products', [ProductController::class, 'products']);
    Route::get('sale-products', [ProductController::class, 'products']);

    Route::post('product/favourite/{product}', [ProductController::class, 'handleFavourite']);
    Route::post('product/review/{product}', [ProductController::class, 'submitReview']);

    Route::get('products/my-favourite', [ProductController::class, 'myFavourites']);
    
    
});