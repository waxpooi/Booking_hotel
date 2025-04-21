@extends('layouts.app')

@section('title', 'Reservasi Kamar')

@section('content')
<div class="container">
    <h2 class="text-center">Reservasi Kamar</h2>

    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kamar_id" class="form-label">Pilih Tipe Kamar</label>
            <select class="form-control" name="room_id" required>
                <option value="" disabled selected>Pilih Kamar</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}">{{ $room->room_type }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah_kamar" class="form-label">Jumlah Kamar</label>
            <input type="number" class="form-control" name="jumlah_kamar" min="1" required>
        </div>

        <div class="mb-3">
            <label for="check_in" class="form-label">Tanggal Check-in</label>
            <input type="date" class="form-control" name="check_in" required>
        </div>

        <div class="mb-3">
            <label for="check_out" class="form-label">Tanggal Check-out</label>
            <input type="date" class="form-control" name="check_out" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Anda</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    </form>
</div>
@endsection
