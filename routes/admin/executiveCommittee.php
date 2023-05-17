<?php

use App\Http\Controllers\ExecutiveCommitteeController;
use Illuminate\Support\Facades\Route;

Route::resource('/executiveCommittee', ExecutiveCommitteeController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/executiveCommittee/status/{id}', [ExecutiveCommitteeController::class, 'status']);

Route::post('/executiveCommittee/order/{id}', [ExecutiveCommitteeController::class, 'order']);

