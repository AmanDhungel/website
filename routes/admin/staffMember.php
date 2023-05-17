<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::resource('/staffMembers', StaffController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/staffMembers/status/{id}', [StaffController::class, 'status']);

Route::post('/staffMembers/order/{id}', [StaffController::class, 'order']);

