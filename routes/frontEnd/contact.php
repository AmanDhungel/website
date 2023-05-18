<?php
use App\Http\Controllers\FrontEnd\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/contact', [ContactController::class, 'index']);