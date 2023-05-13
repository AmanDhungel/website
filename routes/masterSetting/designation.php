<?php

use App\Http\Controllers\MasterSettings\DesigmationController;
use Illuminate\Support\Facades\Route;

Route::resource('/designations', DesigmationController::class)
    ->except(['create', 'edit', 'show']);