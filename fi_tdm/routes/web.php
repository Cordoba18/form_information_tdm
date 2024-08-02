<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;

Route::get('', [HomeController::class, 'index'])->name('home');
Route::post('/save', [HomeController::class, 'save'])->name('home.save');
Route::get('/show', [HomeController::class, 'show'])->name('home.show');

