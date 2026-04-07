<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController1 extends Controller
{
    public function index() {
        // Lấy 12 phim có popularity > 450, vote > 7, giảm dần theo ngày
        $movies = DB::table('movie')
            ->where('popularity', '>', 450)
            ->where('vote_average', '>', 7)
            ->where('status', 1)
            ->orderByDesc('release_date')->limit(12)->get();
        return view('movie.index', compact('movies'));
    }

    public function theloai($id) {
        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
            ->where('movie_genre.id_genre', $id)
            ->where('movie.status', 1)
            ->orderByDesc('movie.release_date')->limit(12)->get();
        return view('movie.index', compact('movies'));
    }

    public function timkiem(Request $request) {
        $keyword = $request->input('keyword');
        // Sử dụng câu lệnh DB::select như đề bài yêu cầu
        $movies = DB::select("select * from movie where status = 1 and movie_name_vn like ?", ["%".$keyword."%"]);
        return view('movie.index', compact('movies'));
    }

    public function chitiet($id) {
        $movie = DB::table('movie')->where('id', $id)->first();
        return view('movie.chitiet', compact('movie'));
    }
}