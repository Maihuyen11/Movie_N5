<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController2;
use App\Http\Controllers\MovieController3;
Route::get('/', [App\Http\Controllers\MovieController1::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController1::class, 'theloai']);
Route::post('/timkiem', [App\Http\Controllers\MovieController1::class, 'timkiem']);
Route::get('/chitiet/{id}', [App\Http\Controllers\MovieController1::class, 'chitiet'])->name('movie.chitiet');

//Danh sách phim
Route::get('/movies', [MovieController2::class, 'index'])->name('movies.index');

// Xóa mềm
Route::delete('/movies/{id}', [MovieController2::class, 'destroy'])->name('movies.destroy');
Route::get('/movie/create', [MovieController3::class, 'create'])->name('movies.create');
Route::post('/movies', [MovieController3::class, 'store'])->name('movies.store');
