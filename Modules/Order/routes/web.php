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
    Route::resource('order', OrderController::class)->names('order');
});
Route::get('/order/order-list/{order_id}', [OrderController::class, 'orderList'])->name('order.orderList');
Route::get('/order/add-product/{order_id}', [OrderController::class, 'addProduct'])->name('order.addProduct');
Route::post('/order/store-product/{order_id}', [OrderController::class, 'storeProduct'])->name('order.storeProduct');
