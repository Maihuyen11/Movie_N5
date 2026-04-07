<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController2;


// Danh sách phim
Route::get('/movies', [MovieController2::class, 'index'])->name('movies.index');

// Xóa mềm
Route::delete('/movies/{id}', [MovieController2::class, 'destroy'])->name('movies.destroy');
Route::get('/', [App\Http\Controllers\MovieController1::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController1::class, 'theloai']);
Route::post('/timkiem', [App\Http\Controllers\MovieController1::class, 'timkiem']);
Route::get('/chitiet/{id}', [App\Http\Controllers\MovieController1::class, 'chitiet'])->name('movie.chitiet');
