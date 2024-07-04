<?php

use Illuminate\Support\Facades\Route;
use Modules\Supplier\Http\Controllers\SupplierController;

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
    Route::get('supplier', [SupplierController::class, 'index'])->middleware('checkpermission:1,1')->name('supplier.index');
    Route::get('supplier/create', [SupplierController::class, 'create'])->middleware('checkpermission:1,5')->name('supplier.create');
    Route::post('supplier', [SupplierController::class, 'store'])->middleware('checkpermission:1,5')->name('supplier.store');
    Route::get('supplier/{supplier}/edit', [SupplierController::class, 'edit'])->middleware('checkpermission:1,6')->name('supplier.edit');
    Route::patch('supplier/{supplier}', [SupplierController::class, 'update'])->middleware('checkpermission:1,6')->name('supplier.update');
});
