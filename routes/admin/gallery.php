<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::resource('/galleryManagement', GalleryController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/galleryManagement/status/{id}', [GalleryController::class, 'status']);

Route::post('/galleryManagement/order/{id}', [GalleryController::class, 'order']);

