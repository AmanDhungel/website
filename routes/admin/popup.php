<?php

use App\Http\Controllers\PopupController;
use Illuminate\Support\Facades\Route;

Route::resource('/popup', PopupController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/popup/status/{id}', [PopupController::class, 'status']);

