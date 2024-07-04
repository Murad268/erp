<?php

use Illuminate\Support\Facades\Route;
use Modules\MenuLinks\Http\Controllers\MenuLinksController;

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
    Route::get('menulinks', [MenuLinksController::class, 'index'])->middleware('checkpermission:5,1')->name('menulinks.index');
    Route::get('menulinks/create', [MenuLinksController::class, 'create'])->middleware('checkpermission:5,5')->name('menulinks.create');
    Route::post('menulinks', [MenuLinksController::class, 'store'])->middleware('checkpermission:5,5')->name('menulinks.store');
    Route::get('menulinks/{menulink}/edit', [MenuLinksController::class, 'edit'])->middleware('checkpermission:5,6')->name('menulinks.edit');
    Route::match(['put', 'patch'], 'menulinks/{menulink}', [MenuLinksController::class, 'update'])->middleware('checkpermission:5,6')->name('menulinks.update');
});
