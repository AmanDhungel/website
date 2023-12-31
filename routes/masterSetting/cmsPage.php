<?php

use App\Http\Controllers\MasterSettings\CmsPageController;
use Illuminate\Support\Facades\Route;

Route::resource('/cmsPages', CmsPageController::class)
    ->except(['create', 'edit', 'show']);


Route::post('/cmsPages/status/{id}', [CmsPageController::class, 'status']);