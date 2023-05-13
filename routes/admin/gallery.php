<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::resource('/galleries', GalleryController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/galleries/status/{id}', [GalleryController::class, 'status']);

