<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::resource('/blogs', BlogController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/blogs/status/{id}', [BlogController::class, 'status']);

