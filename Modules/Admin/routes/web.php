<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;

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


Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', [AdminController::class, 'index'])->middleware('checkpermission:7,1')->name('admin.index');
    Route::get('admin/create', [AdminController::class, 'create'])->middleware('checkpermission:7,5')->name('admin.create');
    Route::post('admin', [AdminController::class, 'store'])->middleware('checkpermission:7,5')->name('admin.store');
    Route::get('admin/{admin}/edit', [AdminController::class, 'edit'])->middleware('checkpermission:7,6')->name('admin.edit');
    Route::match(['put', 'patch'], 'admin/{admin}', [AdminController::class, 'update'])->middleware('checkpermission:7,6')->name('admin.update');
});
