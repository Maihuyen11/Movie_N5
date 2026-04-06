<x-movie-layout>
    <div class="container mt-4 mb-5">
        <h3 class="text-center text-primary font-weight-bold text-uppercase mb-4">THÊM PHIM</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group mb-3">
                <label for="movie_name_en">Tên tiếng Anh</label>
                <input type="text" name="movie_name_en" id="movie_name_en" class="form-control" value="{{ old('movie_name_en') }}">
                @error('movie_name_en')
                    <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="movie_name_vn">Tên tiếng Việt</label>
                <input type="text" name="movie_name_vn" id="movie_name_vn" class="form-control" value="{{ old('movie_name_vn') }}">
                @error('movie_name_vn')
                    <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="release_date">Ngày phát hành</label>
                <input type="text" name="release_date" id="release_date" class="form-control" placeholder="yyyy-mm-dd" value="{{ old('release_date') }}">
                @error('release_date')
                    <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="overview">Mô tả</label>
                <textarea name="overview" id="overview" class="form-control" rows="4">{{ old('overview') }}</textarea>
                @error('overview')
                    <span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="image">Ảnh đại diện</label>
                <input type="file" name="image" id="image" class="form-control-file">
                @error('image')
                    <br><span class="text-danger" style="font-size: 14px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4">Lưu</button>
            </div>
        </form>
    </div>
</x-movie-layout>