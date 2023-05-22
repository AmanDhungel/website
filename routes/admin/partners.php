<?php

use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

Route::resource('/partners', PartnerController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/partners/status/{id}', [PartnerController::class, 'status']);

