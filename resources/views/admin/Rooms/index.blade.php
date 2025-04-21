@extends('layouts.admin')

@section('content')
    <h1>Daftar Kamar</h1>
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">Tambah Kamar</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Jenis Kamar</th>
                <th>Kapasitas</th>
                <th>Harga</th>
                <th>Fasilitas</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->room_facilities }}</td>
                    <td>
                        @if($room->image)
                            <img src="{{ asset('storage/rooms/' . $room->image) }}" alt="Room Image" width="50">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
