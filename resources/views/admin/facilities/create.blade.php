@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Fasilitas</h2>
    <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Fasilitas</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
