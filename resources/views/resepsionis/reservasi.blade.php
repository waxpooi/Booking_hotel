@extends('layouts.app')

@section('title', 'Reservasi - Resepsionis')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Daftar Reservasi</h2>


    <form action="{{ route('resepsionis.filter') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>


    <form action="{{ route('resepsionis.search') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="nama" class="form-control" placeholder="Cari nama tamu..." required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">Cari</button>
            </div>
        </div>
    </form>

 
    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Tamu</th>
                <th>Tipe Kamar</th>
                <th>Jumlah Kamar</th>
                <th>Check-in</th>
                <th>Check-out</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservasi as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama_tamu }}</td>
                <td>{{ $item->tipe_kamar }}</td>
                <td>{{ $item->jumlah_kamar }}</td>
                <td>{{ $item->check_in }}</td>
                <td>{{ $item->check_out }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6">Tidak ada data reservasi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
