<?php
use Illuminate\Support\Facades\Route;
use Modules\Income\Http\Controllers\IncomeController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('income', IncomeController::class)->names('income');
});
Route::post('income/delete_selected_items', [IncomeController::class, 'delete_selected_items'])->name('income.delete_selected_items');
