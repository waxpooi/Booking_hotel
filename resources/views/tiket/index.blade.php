@extends('layouts.app')

@section('title', 'Tiket Saya')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Daftar Tiket / Reservasi Anda</h2>

    @if($reservations->isEmpty())
        <div class="alert alert-info text-center">
            Belum ada reservasi.
        </div>
    @else
        <div class="row">
            @foreach($reservations as $reservation)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="mb-2">Check-in: {{ $reservation->check_in }}</h5>
                        <p>Email: {{ $reservation->email }}</p>
                        <p>Status:
                            <span class="badge bg-warning text-dark">{{ ucfirst($reservation->status) }}</span>
                        </p>
                        <p>Pembayaran:
                            @if($reservation->payment_status == 'paid')
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-danger">Belum Dibayar</span>
                            @endif
                        </p>
                        {{-- <a href="{{ route('tiket.detail', $reservation->id) }}" class="btn btn-primary btn-sm mt-2">Lihat Detail</a> --}}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
