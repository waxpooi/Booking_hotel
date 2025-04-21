@extends('layouts.admin')

@section('content')
    <h1>Tambah Kamar</h1>

    <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="room_type">Jenis Kamar</label>
            <input type="text" class="form-control" id="room_type" name="room_type" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="capacity">Kapasitas</label>
            <input type="number" class="form-control" id="capacity" name="capacity" required>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="quantity">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="form-group">
            <label for="room_facilities">Fasilitas Kamar</label>
            <input type="text" class="form-control" id="room_facilities" name="room_facilities">
        </div>

        <div class="form-group">
            <label for="image">Gambar Kamar</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
