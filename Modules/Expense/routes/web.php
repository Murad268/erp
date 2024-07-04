<?php

use Illuminate\Support\Facades\Route;
use Modules\Expense\Http\Controllers\ExpenseController;

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
    Route::get('expense', [ExpenseController::class, 'index'])->middleware('checkpermission:3,1')->name('expense.index');
    Route::get('expense/create', [ExpenseController::class, 'create'])->middleware('checkpermission:3,5')->name('expense.create');
    Route::post('expense', [ExpenseController::class, 'store'])->middleware('checkpermission:3,5')->name('expense.store');
    Route::get('expense/{expense}/edit', [ExpenseController::class, 'edit'])->middleware('checkpermission:3,6')->name('expense.edit');
    Route::match(['put', 'patch'], 'expense/{expense}', [ExpenseController::class, 'update'])->middleware('checkpermission:3,6')->name('expense.update');
});
