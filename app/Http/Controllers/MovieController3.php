<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MovieController3 extends Controller
{
    public function create()
    {
        $genre = DB::table('genre')->get();
        return view('movie.create', compact('genre'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required'    => 'Trường :attribute không được bỏ trống.',
            'image'       => 'File tải lên phải là định dạng ảnh.',
            'date_format' => 'Ngày phát hành phải nhập đúng định dạng yyyy-mm-dd.',
        ];

        $attributes = [
            'movie_name_en' => 'Tên tiếng Anh',
            'movie_name_vn' => 'Tên tiếng Việt',
            'release_date'  => 'Ngày phát hành',
            'overview'      => 'Mô tả',
            'image'         => 'Ảnh đại diện',
        ];

        $request->validate([
            'movie_name_en' => 'required',
            'movie_name_vn' => 'required',
            'release_date'  => 'required|date_format:Y-m-d', 
            'overview'      => 'required',
            'image'         => 'required|image', 
        ], $messages, $attributes);

        $maxId = DB::table('movie')->max('id');
        $newId = $maxId + 1;

        $imageName = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('/', 'public');
            $imageName = basename($path);
        }

        DB::table('movie')->insert([
            'id'            => $newId,
            'movie_name'    => $request->movie_name_en, 
            'movie_name_vn' => $request->movie_name_vn,
            'original_name' => $request->movie_name_en, 
            'release_date'  => $request->release_date,
            'overview'      => $request->overview,
            'image'         => $imageName,
            'updated_at'    => now(),
        ]);

        return redirect()->back()->with('success', 'Đã thêm phim mới thành công!');
    }
}