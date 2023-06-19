<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Admin\Website\MenuController;
use App\Http\Controllers\Admin\Website\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('website-manager')->middleware('auth')->namespace('Website')->name('website.')->group(function () {
    $settings_modules = [
        'pages'     => 'PagesController',
        'menus'     => 'MenuController',
    ];
    Route::get('/', 'IndexController@index')->name('index');
    
    create_default_routes($settings_modules);
});

Route::prefix('users')->middleware('auth')->namespace('Users')->name('users.')->group(function () {
    $settings_modules = [
        'roles' => 'RolesController',
        'users' => 'UsersController',
    ];
    Route::get('/', 'IndexController@index')->name('index');
    Route::match(["GET", "PUT"],'users/edit-profile', 'UsersController@editProfile')->name('users.edit-profile');
    create_default_routes($settings_modules);
});

Route::prefix('products')->middleware('auth')->namespace('Products')->name('products.')->group(function () {
    $settings_modules = [
        'category'     => 'CategoryController',
        'color'     => 'ColorController',
        'size'     => 'SizeController',
        'brand'     => 'BrandController',
        'product'     => 'ProductController',
    ];
    #Route::get('/', 'IndexController@index')->name('index');
    
    create_default_routes($settings_modules);
});



// Route::prefix('settings')->middleware('auth')->namespace('Settings')->name('settings.')->group(function () {
//     $settings_modules = [
//         'configurations' => 'ConfigurationsController',
//         'shortcode' => 'ShortCodeController',
//         'activity-log' => 'ActivityLogController',
//         'black-list' => 'BlackListController',
//     ];
//     #Route::get('/', 'IndexController@index')->name('index');
//     create_default_routes($settings_modules);
// });
