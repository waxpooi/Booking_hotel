@extends('layouts.app')

@section('title', 'Detail Reservasi')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Detail Reservasi</h2>

    <div class="card shadow p-4">
        @if(session('success'))
            <script>
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            </script>
        @endif

        <div class="mb-3">
            <p><strong>Email:</strong> {{ $reservation->email }}</p>
            <p><strong>Check-in:</strong> {{ $reservation->check_in }}</p>
            <p><strong>Check-out:</strong> {{ $reservation->check_out }}</p>
            <p><strong>Status:</strong>
                <span class="badge bg-warning">{{ ucfirst($reservation->status) }}</span>
            </p>
            <p><strong>Status Pembayaran:</strong>
                @if($reservation->payment_status == 'pending')
                    <span class="badge bg-danger">Belum Dibayar</span>
                @elseif($reservation->payment_status == 'paid')
                    <span class="badge bg-success">Lunas</span>
                @else
                    <span class="badge bg-secondary">Gagal</span>
                @endif
            </p>
        </div>

        <hr>

        <div class="text-center">
            @if($reservation->payment_status == 'pending')
                <form action="{{ route('reservation.payment', $reservation->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="payment_proof" class="form-label fw-bold">Upload Bukti Pembayaran</label>
                        <input type="file" name="payment_proof" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-upload"></i> Konfirmasi Pembayaran
                    </button>
                </form>
            @else
                <div class="card p-3 shadow mt-3">
                    <p class="fw-bold text-center">Bukti Pembayaran</p>
                    <img src="{{ asset('payments/' . $reservation->payment_proof) }}" alt="Bukti Pembayaran" class="img-fluid rounded shadow">
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
