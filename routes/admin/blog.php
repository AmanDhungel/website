<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::resource('/blogManagement', BlogController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/blogManagement/status/{id}', [BlogController::class, 'status']);

Route::post('/blogManagement/order/{id}', [BlogController::class, 'order']);

