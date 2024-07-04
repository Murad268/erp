<?php

use Illuminate\Support\Facades\Route;
use Modules\Invoice\Http\Controllers\InvoiceController;

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
    Route::get('invoice', [InvoiceController::class, 'index'])->middleware('checkpermission:2,1')->name('invoice.index');
    Route::get('invoice/create', [InvoiceController::class, 'create'])->middleware('checkpermission:2,5')->name('invoice.create');
    Route::post('invoice', [InvoiceController::class, 'store'])->middleware('checkpermission:2,5')->name('invoice.store');
    Route::get('invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->middleware('checkpermission:2,6')->name('invoice.edit');
    Route::match(['put', 'patch'], 'invoice/{invoice}', [InvoiceController::class, 'update'])->middleware('checkpermission:2,6')->name('invoice.update');
    Route::delete('invoice/{invoice}', [InvoiceController::class, 'destroy'])->middleware('checkpermission:2,7')->name('invoice.destroy');
});
