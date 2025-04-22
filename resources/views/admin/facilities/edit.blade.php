@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Fasilitas</h2>
    <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="mb-3">
            <label class="form-label">Nama Fasilitas</label>
            <input type="text" name="name" value="{{ old('name', $facility->name) }}" class="form-control @error('name') is-invalid @enderror" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $facility->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar</label><br>
            @if ($facility->image)
                <img src="{{ asset('storage/' . $facility->image) }}" alt="Gambar Fasilitas" width="150" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.facilities.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
