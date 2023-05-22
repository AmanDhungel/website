<?php

use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

Route::resource('/publications', PublicationController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/publications/status/{id}', [PublicationController::class, 'status']);

