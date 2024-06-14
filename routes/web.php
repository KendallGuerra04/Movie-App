<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/movie/{id}/{type}', [HomeController::class, 'movie'])->name('movie');
