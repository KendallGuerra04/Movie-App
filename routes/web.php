<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/movies/{page}', [HomeController::class, 'movies'])->name('movies');
Route::get('/tv-series/{page}', [HomeController::class, 'series'])->name('series');
Route::get('/mtv/{id}/{type}', [HomeController::class, 'mtv'])->name('mtv');
