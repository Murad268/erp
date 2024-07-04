<?php

use Illuminate\Support\Facades\Route;
use Modules\Income\Http\Controllers\IncomeController;

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
    Route::get('income', [IncomeController::class, 'index'])->middleware('checkpermission:8,1')->name('income.index');
    Route::get('income/create', [IncomeController::class, 'create'])->middleware('checkpermission:8,5')->name('income.create');
    Route::post('income', [IncomeController::class, 'store'])->middleware('checkpermission:8,5')->name('income.store');
    Route::get('income/{income}/edit', [IncomeController::class, 'edit'])->middleware('checkpermission:8,6')->name('income.edit');
    Route::match(['put', 'patch'], 'income/{income}', [IncomeController::class, 'update'])->middleware('checkpermission:8,6')->name('income.update');
});
