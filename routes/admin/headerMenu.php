<?php

use App\Http\Controllers\HeaderMenuController;
use Illuminate\Support\Facades\Route;

Route::resource('/headermenu', HeaderMenuController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/headermenu/status/{id}', [HeaderMenuController::class, 'status']);

