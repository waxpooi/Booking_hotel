@extends('layouts.admin')


@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Fasilitas</h2>
    <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary mb-3">Tambah Fasilitas</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $facility->name }}</td>
                <td>{{ $facility->description }}</td>
                <td>
                    <a href="{{ route('admin.facilities.edit', $facility->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
