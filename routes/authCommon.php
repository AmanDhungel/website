<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;




Route::get('webAdmin', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('login', [LoginController::class, 'login'])
    ->name('login');

Route::post('forgotPassword', [ForgotPasswordController::class, 'forgotPassword'])
    ->name('forgotPassword');

Route::get('passwordReset/{token}', [ResetPasswordController::class, 'getPassword'])
    ->name('getPassword');

Route::post('passwordReset', [ResetPasswordController::class, 'passwordReset'])
    ->name('passwordReset');

Route::get('passwordUpdate/{token}/{type}', [ResetPasswordController::class, 'getNewPassword'])
    ->name('passwordUpdate');

Illuminate\Support\Facades\Auth::routes([
    'register' => false,
    'verify' => false,
    'login' => false,
    'confirm' => false,
]);
