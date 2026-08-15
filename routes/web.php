<?php

use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SongController::class, 'index']);

Route::patch('/songs/{song}/favorite', [SongController::class, 'favorite'])->name('songs.favorite');

Route::resource('songs', SongController::class);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});