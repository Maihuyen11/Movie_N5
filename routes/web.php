<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);

use App\Http\Controllers\MovieController3;

// Route hiển thị form
Route::get('/movie/create', [MovieController3::class, 'create'])->name('movies.create');

// Route xử lý lưu dữ liệu (Quan trọng: phải có ->name('movies.store'))
Route::post('/movies', [MovieController3::class, 'store'])->name('movies.store');