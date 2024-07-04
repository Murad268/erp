<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;

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

Route::group([], function () {
    Route::get('product', [ProductController::class, 'index'])->middleware('checkpermission:3,1')->name('product.index');
    Route::get('product/create', [ProductController::class, 'create'])->middleware('checkpermission:3,5')->name('product.create');
    Route::post('product', [ProductController::class, 'store'])->middleware('checkpermission:3,5')->name('product.store');
    Route::get('product/{product}/edit', [ProductController::class, 'edit'])->middleware('checkpermission:3,6')->name('product.edit');
    Route::match(['put', 'patch'], 'product/{product}', [ProductController::class, 'update'])->middleware('checkpermission:3,6')->name('product.update');
});
