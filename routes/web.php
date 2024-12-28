<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;

// Login
Route::get('/', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login.authenticate');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

// Register

// Beranda
Route::get('/beranda', [NewsController::class, 'beranda'])->name('news.beranda');
// Feed

// Detail
