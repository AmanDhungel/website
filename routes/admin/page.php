<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::resource('/pagemanager', PageController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/pagemanager/status/{id}', [PageController::class, 'status']);

