<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

    // Route to Dashboard
    Route::get('/', function () {
        return view('welcome');
    });

    // Managing the products
    Route::resource('products', ProductController::class);
    // Managing the brands
    Route::resource('brands', BrandController::class);
    // Managing the categories
    Route::resource('categories', CategoryController::class);
});
