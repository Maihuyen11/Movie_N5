<x-movie-layout>
    <x-slot name="title">Movie</x-slot>
    <div class="list-movie">
        @foreach($movies as $row)
        <div class="movie">
            <a href="{{ route('movie.chitiet', $row->id) }}">
                <img src="{{ asset('storage/' .$row->image)}}" alt="{{ $row->movie_name_vn }}" width="100%">
                <div class="movie-info" style="display: block; text-align: center; padding: 10px 0;">
                    <p style="font-weight:bold; margin-bottom:5px;">{{ $row->movie_name_vn ?? $row->movie_name }}</p>
                    <p style="color:#000; margin-bottom: 0;">{{ $row->release_date }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</x-movie-layout>