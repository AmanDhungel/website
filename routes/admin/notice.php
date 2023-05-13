<?php

use App\Http\Controllers\NoticeController;
use Illuminate\Support\Facades\Route;

Route::resource('/notices', NoticeController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/notices/status/{id}', [NoticeController::class, 'status']);

