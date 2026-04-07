<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController2 extends Controller
{
    // Danh sách phim (chỉ lấy status = 1)
    public function index() {
        $movies = Movie::where('status', 1)->get();
        return view('movie.admin', compact('movies'));
    }


    // Xóa mềm
    public function destroy($id) {
        $movie = Movie::findOrFail($id);
        $movie->update(['status' => 0]);

        return redirect()->route('movies.index')
            ->with('success', 'Đã xóa phim thành công!');
    }
}