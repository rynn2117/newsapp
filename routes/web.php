<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;

// Login
Route::middleware('guest')->group(function (){
    Route::get('/', [AuthController::class, 'index'])->name('login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('login.authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('register.index');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
});

Route::middleware('CheckLogin')->group(function (){
    Route::get('/beranda', [NewsController::class, 'beranda'])->name('news.beranda');
    Route::get('/berita', [NewsController::class, 'berita'])->name('news.berita');
    Route::get('/profil', [NewsController::class, 'profil'])->name('news.profil');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});
