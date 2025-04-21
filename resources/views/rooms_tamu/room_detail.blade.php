@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $room->room_type }}</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Deskripsi Kamar</h3>
                <p>{{ $room->description }}</p>
            </div>
            <div class="col-md-6">
                <h3>Informasi Kamar</h3>
                <ul>
                    <li><strong>Kapasitas:</strong> {{ $room->capacity }} orang</li>
                    <li><strong>Harga:</strong> Rp. {{ number_format($room->price, 0, ',', '.') }}</li>
                    <li><strong>Jumlah Kamar:</strong> {{ $room->quantity }} unit</li>
                </ul>
            </div>
        </div>

        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Kembali ke Daftar Kamar</a>
    </div>
@endsection
