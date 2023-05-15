<?php

use App\Http\Controllers\TeamManagementController;
use Illuminate\Support\Facades\Route;

Route::resource('/teamsManagement', TeamManagementController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/teamsManagement/status/{id}', [TeamManagementController::class, 'status']);

Route::post('/teamsManagement/order/{id}', [TeamManagementController::class, 'order']);

