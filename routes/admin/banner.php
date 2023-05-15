<?php

use App\Http\Controllers\BannerManagementController;
use Illuminate\Support\Facades\Route;

Route::resource('/bannersManagement', BannerManagementController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/bannersManagement/status/{id}', [BannerManagementController::class, 'status']);

Route::post('/bannersManagement/order/{id}', [BannerManagementController::class, 'order']);

