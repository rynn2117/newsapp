<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;

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
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');

});


