<?php

use App\Http\Controllers\ContactMessageManagementController;
use Illuminate\Support\Facades\Route;

Route::resource('/subscriberDetails', ContactMessageManagementController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/subscriberDetails/status/{id}', [ContactMessageManagementController::class, 'status']);

