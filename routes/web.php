<?php

use App\Http\Controllers\AuthController;
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
    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('products', ProductController::class);
});

//Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/reset', [AuthController::class, 'reset'])->name('reset');
Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
