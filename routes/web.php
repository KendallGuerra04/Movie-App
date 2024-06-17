<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/movies', [HomeController::class, 'movies'])->name('movies');
Route::get('/tv-series', [HomeController::class, 'series'])->name('series');
Route::get('/movie/{id}/{type}', [HomeController::class, 'movie'])->name('movie');
