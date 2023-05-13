<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::resource('/events', EventController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/events/status/{id}', [EventController::class, 'status']);

