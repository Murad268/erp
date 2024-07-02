<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

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
    Route::resource('user', UserController::class)->names('user');
    Route::get('/send_email_password_reset', [UserController::class, 'send_email_password_reset'])->name('send_email_password_reset');
    Route::get('/new-email', [UserController::class, 'new_email'])->name('new-email');
    Route::post('/send_new_email', [UserController::class, 'send_new_email'])->name('send_new_email');
});
