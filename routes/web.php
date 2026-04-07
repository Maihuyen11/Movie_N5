<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\MovieController1::class, 'index']);
Route::get('/theloai/{id}', [App\Http\Controllers\MovieController1::class, 'theloai']);
Route::post('/timkiem', [App\Http\Controllers\MovieController1::class, 'timkiem']);
Route::get('/chitiet/{id}', [App\Http\Controllers\MovieController1::class, 'chitiet'])->name('movie.chitiet');