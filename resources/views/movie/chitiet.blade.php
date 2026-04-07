<x-movie-layout>
    <x-slot name="title">Chi Tiết</x-slot>
    <h2>{{ $movie->movie_name_vn ?? $movie->movie_name }}</h2>
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' .$movie->image)}}" alt="Poster" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p>Ngày phát hành: <strong> {{ $movie->release_date }}</strong></p>
            <p>Quốc gia: <strong> {{ $movie->country_name }}</strong></p>
            <p>Thời gian: <strong> {{ $movie->runtime }} phút</strong></p>
            <p>Doanh thu: <strong> {{ $movie->revenue }}</strong></p>
            <p><strong>Mô tả:</strong> <br> {{ $movie->overview_vn ?? $movie->overview }}</p>

            <button type="button" class="btn btn-success">Xem trailer</button>
        </div>
    </div>
</x-movie-layout>