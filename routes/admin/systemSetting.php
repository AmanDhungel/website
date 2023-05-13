<?php

use App\Http\Controllers\SystemSettings\AppSettingController;
use App\Http\Controllers\SystemSettings\EmailSettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('systemSetting')->group(function () {
    Route::resource('/appSetting', AppSettingController::class)
        ->except(['create', 'edit', 'show']);

    Route::resource('/mailSetting', EmailSettingController::class)
        ->except(['create', 'edit', 'show']);

    Route::post('/mailSetting/status/{id}', [EmailSettingController::class, 'status']);


    Route::post('/uploadSystemSettingFile/{id}', [AppSettingController::class, 'uploadFile']);

});
