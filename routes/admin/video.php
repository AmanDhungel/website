<?php

use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::resource('/videoManagement', VideoController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/videoManagement/status/{id}', [VideoController::class, 'status']);

Route::post('/videoManagement/order/{id}', [VideoController::class, 'order']);

