<?php

use App\Http\Controllers\SubscriberDetailsController;
use Illuminate\Support\Facades\Route;

Route::resource('/contactMessageManagement', SubscriberDetailsController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/contactMessageManagement/status/{id}', [SubscriberDetailsController::class, 'status']);

