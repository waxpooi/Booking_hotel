<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .card-animation {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-title {
            font-size: 1.6rem;
            font-weight: bold;
        }

        .btn-warning {
            background-color: #f9c74f;
            border-color: #f9c74f;
            color: #000;
        }

        .btn-warning:hover {
            background-color: #f9844a;
            border-color: #f9844a;
            color: #fff;
        }

        .btn-primary {
            background-color: #00b4d8;
            border-color: #00b4d8;
        }

        .btn-primary:hover {
            background-color: #0077b6;
            border-color: #0077b6;
        }
    </style>
</head>

@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4 text-center text-primary">Tipe Kamar</h1>

        @foreach ($rooms as $room)
            <div class="card mb-4 shadow-sm border-0 rounded card-animation">
                <div class="row g-0">

                    <div class="col-md-5">
                        <img src="{{ asset('storage/rooms/' . $room->image) }}" class="img-fluid rounded-start w-100"
                            style="height: 100%; object-fit: cover;" alt="{{ $room->room_type }}">
                    </div>


                    <div class="col-md-7 d-flex align-items-center">
                        <div class="card-body">

                            <h4 class="card-title">{{ $room->room_type }}</h4>
                            <p class="mb-2">
                                <i class="fas fa-tag me-2 text-success"></i>
                                <strong>Harga:</strong> Rp. {{ number_format($room->price, 0, ',', '.') }} / Malam
                            </p>
                            <p class="mb-3">
                                <i class="fas fa-concierge-bell me-2 text-info"></i>
                                <strong>Fasilitas ada di selengkapnya</strong>
                            </p>
                            <ul class="list-unstyled mb-3 ps-3">
                                <li><i class="fas fa-ruler-combined me-2 text-primary"></i> Kapasitas:
                                    {{ $room->capacity ?? '-' }}</li>
                                <li><i class="fas fa-bed me-2 text-primary"></i> Jumlah Tempat Tidur:
                                    {{ $room->quantity ?? '-' }}</li>
                            </ul>
                            <p class="text-muted">{{ $room->description ?? 'Deskripsi belum tersedia.' }}</p>
                            <div class="d-flex gap-2 mt-3">
                                <a href="{{ route('rooms.show_tamu', $room->id) }}" class="btn btn-warning w-50">Lihat
                                    Detail</a>
                                <a href="{{ route('reservation.index') }}" class="btn btn-success w-50">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
