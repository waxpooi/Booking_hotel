<head>
    <style>
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            border: none;
        }

        .badge {
            font-size: 0.9rem;
            padding: 0.5em 0.75em;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-success,
        .btn-primary {
            transition: 0.3s ease-in-out;
        }

        .btn-success:hover,
        .btn-primary:hover {
            transform: scale(1.05);
        }

        .img-fluid {
            max-height: 350px;
            object-fit: cover;
        }

        .text-center a.btn {
            width: 100%;
            max-width: 300px;
        }

        @media (max-width: 576px) {
            .text-center a.btn {
                max-width: 100%;
            }
        }
    </style>

</head>
@extends('layouts.app')

@section('title', 'Detail Reservasi')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">Detail Reservasi</h2>

        @if (session('success'))
            <script>
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            </script>
        @endif

        <div class="card shadow-sm p-4">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $reservation->email }}</p>
                    <p><strong>Check-in:</strong>
                        {{ \Carbon\Carbon::parse($reservation->check_in)->translatedFormat('d F Y') }}</p>
                    <p><strong>Check-out:</strong>
                        {{ \Carbon\Carbon::parse($reservation->check_out)->translatedFormat('d F Y') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Status Reservasi:</strong>
                        <span
                            class="badge
                        @if ($reservation->status == 'confirmed') bg-success
                        @elseif($reservation->status == 'pending') bg-warning
                        @else bg-secondary @endif">
                            {{ ucfirst($reservation->status) }}
                        </span>
                    </p>

                    <p><strong>Status Pembayaran:</strong>
                        <span
                            class="badge
                        @if ($reservation->payment_status == 'paid') bg-success
                        @elseif($reservation->payment_status == 'pending') bg-danger
                        @else bg-secondary @endif">
                            {{ ucfirst($reservation->payment_status == 'paid' ? 'Lunas' : ($reservation->payment_status == 'pending' ? 'Belum Dibayar' : 'Gagal')) }}
                        </span>
                    </p>
                </div>
            </div>

            <hr>

            <div class="text-center">
                @if ($reservation->payment_status == 'pending')
                    <form action="{{ route('reservation.payment', $reservation->id) }}" method="POST"
                        enctype="multipart/form-data" class="mt-3">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="payment_proof" class="form-label fw-bold">Upload Bukti Pembayaran</label>
                            <input type="file" name="payment_proof" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-upload"></i> Konfirmasi Pembayaran
                        </button>
                    </form>
                @elseif($reservation->payment_proof)
                    <div class="card p-3 shadow mt-3">
                        <p class="fw-bold text-center mb-2">Bukti Pembayaran</p>
                        <img src="{{ asset('payments/' . $reservation->payment_proof) }}" alt="Bukti Pembayaran"
                            class="img-fluid rounded shadow">
                    </div>
                @endif

                @if ($reservation->payment_status == 'paid' && $reservation->status == 'confirmed')
                    <div class="text-center mt-4">
                        <a href="{{ route('tiket', $reservation->id) }}" class="btn btn-success"
                            target="_blank">
                            <i class="fas fa-ticket-alt"></i> Cetak Tiket
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
