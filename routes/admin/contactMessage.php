<?php

use App\Http\Controllers\ContactMessageManagementController;
use Illuminate\Support\Facades\Route;

Route::resource('/contactMessageList', ContactMessageManagementController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/contactMessageList/status/{id}', [ContactMessageManagementController::class, 'status']);

