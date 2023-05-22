<?php

use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::resource('/programs', ProgramController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/programs/status/{id}', [ProgramController::class, 'status']);

