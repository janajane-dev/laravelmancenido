<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/', [SongController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::patch('/songs/{song}/favorite', [SongController::class, 'favorite'])->name('songs.favorite');
    Route::resource('songs', SongController::class);
});