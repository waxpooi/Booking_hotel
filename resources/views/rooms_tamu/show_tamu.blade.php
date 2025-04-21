<head>
    <style>
        .room-details ul {
            list-style-type: none;
            padding-left: 0;
            margin-top: 20px;
        }

        .room-details li {
            font-size: 1rem;
            color: #555;
            margin-bottom: 12px;
            padding-left: 30px;
            position: relative;
        }

        .room-details li strong {
            font-weight: bold;
            color: #333;
        }

        .room-details li:before {
            content: "\2022";  /* Bullet point */
            font-size: 20px;
            color: #007bff;
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .room-details ul li ul {
            padding-left: 20px;
            margin-top: 10px;
        }

        .room-details ul li ul li {
            font-size: 0.95rem;
            color: #6c757d;
        }

        .room-details .price {
            font-size: 1.25rem;
            color: #28a745;
            font-weight: bold;
        }

        .room-details .capacity,
        .room-details .quantity {
            font-size: 1rem;
            color: #6c757d;
        }

        .room-details .facilities {
            color: #495057;
            font-size: 1rem;
        }

        .room-details .facilities ul {
            list-style-type: none;
            padding-left: 0;
        }

        .room-details .facilities li {
            margin-bottom: 8px;
            font-size: 1rem;
            color: #555;
        }

        .room-details .facilities li:before {
            content: "\2713";  /* Checkmark icon */
            font-size: 18px;
            color: #007bff;
            margin-right: 10px;
        }
    </style>
</head>

@extends('layouts.app')

@section('content')
    <div class="container mt-5 room-details">
        <h2 class="mb-4 text-center text-primary">{{ $room->room_type }} - Detail Kamar</h2>

        <div class="card">
            @if($room->image)
                <img src="{{ asset('storage/rooms/' . $room->image) }}" class="card-img-top"
                     alt="{{ $room->room_type }}" style="height: 300px; object-fit: cover;">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $room->room_type }}</h5>
                <p class="card-text">{{ $room->description }}</p>

                <ul>
                    <li><strong>Kapasitas:</strong> <span class="capacity">{{ $room->capacity }} orang</span></li>
                    <li><strong>Harga per malam:</strong> <span class="price">Rp {{ number_format($room->price, 0, ',', '.') }}</span></li>
                    <li><strong>Jumlah kamar tersedia:</strong> <span class="quantity">{{ $room->quantity }}</span></li>
                    <li><strong>Fasilitas:</strong>
                        <ul class="facilities">
                            @foreach(explode(',', $room->room_facilities) as $facility)
                                <li>{{ trim($facility) }}</li>
                            @endforeach
                        </ul>
                    </li>
                </ul>

                <div class="d-flex justify-content-start">
                    <a href="{{ route('rooms.rooms') }}" class="btn btn-primary">Kembali ke Daftar Kamar</a>
                    <a href="{{ route('reservation.index') }}" class="btn btn-success ms-2">Book Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
