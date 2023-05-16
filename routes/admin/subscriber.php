<?php

use App\Http\Controllers\SubscriberDetailsController;
use Illuminate\Support\Facades\Route;

Route::resource('/subscriberList', SubscriberDetailsController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/subscriberList/status/{id}', [SubscriberDetailsController::class, 'status']);

