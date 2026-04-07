<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController2;

// Home redirect
Route::get('/', function () {
    return redirect()->route('movies.index');
});

// Danh sách phim
Route::get('/movies', [MovieController2::class, 'index'])->name('movies.index');


// Xóa mềm
Route::delete('/movies/{id}', [MovieController2::class, 'destroy'])->name('movies.destroy');