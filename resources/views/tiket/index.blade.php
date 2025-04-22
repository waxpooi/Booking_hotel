@extends('layouts.app')

@section('title', 'Tiket Saya')

@section('content')
    <div class="container">
        <h2 class="mb-4 text-center">Daftar Tiket / Reservasi Anda</h2>

        @if ($reservations->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada reservasi.
            </div>
        @else
            <div class="row">
                @foreach ($reservations as $reservation)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm p-3">
                            <h5 class="mb-2">Check-in: {{ $reservation->check_in }}</h5>
                            <p>Email: {{ $reservation->email }}</p>
                            <p>Status:
                                <span
                                    class="badge
                            {{ $reservation->status === 'confirmed'
                                ? 'bg-success'
                                : ($reservation->status === 'rejected'
                                    ? 'bg-danger'
                                    : 'bg-warning text-dark') }}">
                                    {{ ucfirst($reservation->status) }}
                                </span>
                            </p>

                            @if ($reservation->status === 'confirmed')
                                <p><strong>ID Booking:</strong> {{ $reservation->id }}</p>

                                <a href="{{ route('reservations.download', $reservation->id) }}"
                                    class="btn btn-sm btn-outline-primary mt-2" target="_blank">
                                    <i class="bi bi-download"></i> Unduh Bukti Pembayaran (PDF)
                                </a>
                            @elseif($reservation->status === 'rejected')
                                <div class="alert alert-danger mt-2 mb-0">
                                    Reservasi ini telah ditolak.
                                </div>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
