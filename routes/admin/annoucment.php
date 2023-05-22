<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;

Route::resource('/announcements', AnnouncementController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/announcements/status/{id}', [AnnouncementController::class, 'status']);

