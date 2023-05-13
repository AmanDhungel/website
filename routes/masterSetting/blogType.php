<?php

use App\Http\Controllers\MasterSettings\BlogTypeController;
use Illuminate\Support\Facades\Route;

Route::resource('/blogTypes', BlogTypeController::class)
    ->except(['create', 'edit', 'show']);