<?php
use App\Http\Controllers\FrontEnd\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);