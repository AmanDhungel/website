<?php

use App\Http\Controllers\NoticeController;
use Illuminate\Support\Facades\Route;

Route::resource('/noticeManagement', NoticeController::class)
    ->except(['create', 'edit', 'show']);

Route::post('/noticeManagement/status/{id}', [NoticeController::class, 'status']);

Route::post('/noticeManagement/order/{id}', [NoticeController::class, 'order']);
