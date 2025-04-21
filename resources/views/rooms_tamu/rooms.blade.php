<head>
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            transform: translateY(10px);
        }

        .card:hover {
            transform: translateY(-15px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
            background-color: #fff;
            border-top: 1px solid #f1f1f1;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #444;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1.1rem;
            color: #777;
            margin-bottom: 15px;
        }

        .card-img-top {
            transition: transform 0.3s ease;
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }

        .btn-primary {
            background-color: #ff9900;
            border-color: #ff9900;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff7700;
            border-color: #ff7700;
        }

        
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
    </style>
</head>

@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4 text-center text-primary">Daftar Kamar</h1>
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 rounded card-animation">
                        @if ($room->image)
                            <img src="{{ asset('storage/rooms/' . $room->image) }}" class="card-img-top"
                                alt="{{ $room->room_type }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $room->room_type }}</h5>
                            <p class="card-text text-center"><strong>Harga:</strong> Rp.
                                {{ number_format($room->price, 0, ',', '.') }} <strong>/Malam</strong></p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('rooms.show_tamu', $room->id) }}" class="btn btn-primary btn-sm">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
