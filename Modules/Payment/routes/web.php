<?php

use Illuminate\Support\Facades\Route;
use Modules\Payment\Http\Controllers\PaymentController;

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
    Route::get('payment', [PaymentController::class, 'index'])->middleware('checkpermission:2,1')->name('payment.index');
    Route::get('payment/create', [PaymentController::class, 'create'])->middleware('checkpermission:2,5')->name('payment.create');
    Route::post('payment', [PaymentController::class, 'store'])->middleware('checkpermission:2,5')->name('payment.store');
    Route::get('payment/{payment}/edit', [PaymentController::class, 'edit'])->middleware('checkpermission:2,6')->name('payment.edit');
    Route::match(['put', 'patch'], 'payment/{payment}', [PaymentController::class, 'update'])->middleware('checkpermission:2,6')->name('payment.update');
    Route::delete('payment/{payment}', [PaymentController::class, 'destroy'])->middleware('checkpermission:2,7')->name('payment.destroy');
    Route::post('payment/delete_selected_items', [PaymentController::class, 'delete_selected_items'])->name('payment.delete_selected_items');
});
