<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;

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
    Route::get('/', [DashboardController::class, 'index']);

    // Managing the products
    Route::resource('products', ProductController::class);
    // Managing the brands
    Route::resource('brands', BrandController::class);
    // Managing the categories
    Route::resource('categories', CategoryController::class);
    // Managing the batches
    Route::resource('batches', BatchController::class);
    // Managing the suppliers
    Route::resource('suppliers', SupplierController::class);
    // Managing the customers
    Route::resource('customers', CustomerController::class);
    // Managing Invoices
    Route::resource('invoices', InvoiceController::class);
    // Managing Expenses Categories
    Route::resource('expenses', ExpenseController::class);
    // Managing Expenses Categories
    Route::resource('types', TypeController::class);
    // Managing Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    // Managing Reports
    Route::resource('/setting', SettingController::class);
});
