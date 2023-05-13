<?php

use App\Http\Controllers\AboutUsManagementController;
use Illuminate\Support\Facades\Route;

Route::resource('/aboutUsManagement', AboutUsManagementController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/aboutUsManagement/status/{id}', [AboutUsManagementController::class, 'status']);

