<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\CategoryController;

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
    Route::get('category', [CategoryController::class, 'index'])->middleware('checkpermission:2,1')->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->middleware('checkpermission:2,5')->name('category.create');
    Route::post('category', [CategoryController::class, 'store'])->middleware('checkpermission:2,5')->name('category.store');
    Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->middleware('checkpermission:2,6')->name('category.edit');
    Route::match(['put', 'patch'], 'category/{category}', [CategoryController::class, 'update'])->middleware('checkpermission:2,6')->name('category.update');
});
