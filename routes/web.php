<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login-form');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');


Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register-form');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register');
Route::get('/register-verified/{token}/{user_id}', [\App\Http\Controllers\RegisterController::class, 'verified'])->name('register-verified');


Route::get('/reset-password-input-email', [\App\Http\Controllers\ForgotPasswordController::class, 'input_email'])->name('reset-password-input-email');
Route::post('/reset-password-send-to-email', [\App\Http\Controllers\ForgotPasswordController::class, 'send_to_email'])->name('reset-password-send-to-email');

Route::get('/dashboard', [\App\Http\Controllers\SystemController::class, 'index'])->name('dashboard');
Route::get('/forgot-password', [\App\Http\Controllers\ForgotPasswordController::class, 'input_email'])->name('password.request');
Route::post('/forgot-password', [\App\Http\Controllers\ForgotPasswordController::class, 'send_to_email'])->name('reset-password-send-to-email');
Route::get('/reset-password/{token}', [\App\Http\Controllers\ForgotPasswordController::class, 'showResetForm'])->name('reset-password-form');
Route::post('/reset-password', [\App\Http\Controllers\ForgotPasswordController::class, 'reset'])->name('reset-password');

Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');
