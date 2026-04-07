@php use Illuminate\Support\Str; @endphp

<x-movie-layout>
    <x-slot name="title">Quản lý danh sách phim</x-slot>

    <div class="container mt-4">
        <h2 class="text-center mb-4 text-uppercase font-weight-bold">DANH SÁCH PHIM</h2>

        {{-- Thông báo --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3 text-left">
    <a href="{{ route('movies.create') }}" class="btn btn-success">
        <i class=""></i> Thêm
    </a>        
</div>

        <table id="id-table" class="table table-bordered table-striped bg-white">
            <thead>
                <tr class="text-center">
                    <th>Ảnh đại diện</th>
                    <th>Tiêu đề</th>
                    <th>Giới thiệu</th>
                    <th>Ngày phát hành</th>
                    <th>Điểm đánh giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td class="text-center">
                        <img src="{{ asset('storage/' . $movie->image) }}"
                             width="80"
                             class="img-thumbnail">
                    </td>

                    <td class="font-weight-bold">{{ $movie->movie_name_vn }}</td>

                    <td>{{ Str::limit($movie->overview_vn, 60) }}</td>

                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }}
                    </td>

                    <td class="text-center">{{ $movie->vote_average }}</td>

                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-1">

                            {{-- Xem --}}
                            <a href="{{ route('movie.chitiet', $movie->id) }}"
                               class="btn btn-primary btn-sm">
                                Xem
                            </a>

                            {{-- Xóa --}}
                            <form action="{{ route('movies.destroy', $movie->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Bạn có chắc muốn xóa phim này?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Xóa
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- DataTable --}}
    <script>
        $(document).ready(function() {
            $('#id-table').DataTable({
                    responsive: true,
                    pageLength: 5,
                    lengthMenu: [5, 10, 25, 50, 100],
                    bStateSave:true,
                });


        });
    </script>
</x-movie-layout>