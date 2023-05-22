<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::resource('/pages', PageController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/pages/status/{id}', [PageController::class, 'status']);

