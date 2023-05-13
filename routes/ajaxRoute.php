<?php

use App\Http\Controllers\Ajax\CommonController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

Route::get('reload-captcha', [LoginController::class, 'reloadCaptcha']);

Route::post('check_identity', [LoginController::class, 'checkIdentity'])
    ->name('check_identity');

Route::post('check_login_user_name', [CommonController::class, 'check_login_user_name'])
    ->name('check_login_user_name');

Route::post('check_email', [CommonController::class, 'check_email'])
    ->name('check_email');

Route::post('check_mobile', [CommonController::class, 'check_mobile'])
    ->name('check_mobile');

Route::get('change/lang', [LocalizationController::class, 'langChange'])
    ->name('LangChange');
