<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::resource('/eventManagement', EventController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/eventManagement/status/{id}', [EventController::class, 'status']);

Route::post('/eventManagement/order/{id}', [EventController::class, 'order']);

