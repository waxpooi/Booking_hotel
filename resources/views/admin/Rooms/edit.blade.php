@extends('layouts.admin')

@section('content')
    <h1>Edit Kamar</h1>

    <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="room_type">Jenis Kamar</label>
            <input type="text" class="form-control" id="room_type" name="room_type" value="{{ old('room_type', $room->room_type) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $room->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="capacity">Kapasitas</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $room->capacity) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $room->price) }}" required>
        </div>

        <div class="form-group">
            <label for="quantity">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $room->quantity) }}" required>
        </div>

        <div class="form-group">
            <label for="room_facilities">Fasilitas Kamar</label>
            <input type="text" class="form-control" id="room_facilities" name="room_facilities" value="{{ old('room_facilities', $room->room_facilities) }}">
        </div>

        <div class="form-group">
            <label for="image">Gambar Kamar</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($room->image)
                <img src="{{ asset('storage/rooms/' . $room->image) }}" alt="Room Image" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
