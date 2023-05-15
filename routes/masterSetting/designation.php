<?php

use App\Http\Controllers\MasterSettings\DesignationController;
use Illuminate\Support\Facades\Route;

Route::resource('/designations', DesignationController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/designations/status/{id}', [DesignationController::class, 'status']);