<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\OrderController;

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
    Route::get('order', [OrderController::class, 'index'])->middleware('checkpermission:4,1')->name('order.index');
    Route::get('order/create', [OrderController::class, 'create'])->middleware('checkpermission:4,5')->name('order.create');
    Route::get('order/{order}', [OrderController::class, 'show'])->middleware('checkpermission:4,5')->name('order.show');
    Route::get('order/{order}/edit', [OrderController::class, 'edit'])->middleware('checkpermission:4,6')->name('order.edit');
    Route::match(['put', 'patch'], 'order/{order}', [OrderController::class, 'update'])->middleware('checkpermission:4,6')->name('order.update');
});

Route::get('/order/order-list/{order_id}', [OrderController::class, 'orderList'])->middleware('checkpermission:4,6')->name('order.orderList');
Route::get('/order/add-product/{order_id}', [OrderController::class, 'addProduct'])->middleware('checkpermission:4,6')->name('order.addProduct');
Route::post('/order/store-product/{order_id}', [OrderController::class, 'storeProduct'])->middleware('checkpermission:4,6')->name('order.storeProduct');

