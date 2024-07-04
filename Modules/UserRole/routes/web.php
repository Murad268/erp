<?php

use Illuminate\Support\Facades\Route;
use Modules\UserRole\Http\Controllers\UserPermissionController;
use Modules\UserRole\Http\Controllers\UserRoleController;

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
    Route::resource('userrole', UserRoleController::class)->names('userrole');
});
Route::get('/permission-list/{role_id}', [UserPermissionController::class, 'index'])->name('permission.list');
Route::get('/permission-list-add/{role_id}', [UserPermissionController::class, 'create'])->name('permission.create');
Route::post('/permission-list-store/{role_id}', [UserPermissionController::class, 'store'])->name('permission.store');
Route::get('/permission-list-edit/{role_id}/{page_id}', [UserPermissionController::class, 'edit'])->name('permission.edit');
Route::post('/permission-list-update/{role_id}/{page_id}', [UserPermissionController::class, 'update'])->name('permission.update');
