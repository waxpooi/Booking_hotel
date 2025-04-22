<head>
    <style>
        .facility-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 80px;
            gap: 2rem;
        }

        .facility-image-wrapper {
            position: relative;
            flex: 1 1 45%;
            max-width: 400px; /* Ukuran gambar lebih kecil */
        }

        .facility-image-wrapper::before {
            content: "";
            position: absolute;
            top: 20px;
            left: 20px;
            width: 100%;
            height: 100%;
            background-color: #f17326;
            /* orange frame */
            z-index: 0;
            border-radius: 5px;
        }

        .facility-image {
            position: relative;
            z-index: 1;
            width: 100%;
            border-radius: 5px;
            object-fit: cover;
        }

        .facility-content {
            flex: 1 1 45%;
        }

        .facility-content h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .facility-content p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #333;
            text-align: justify;
        }

        /* Efek zigzag kiri-kanan */
        .facility-section:nth-child(odd) .facility-image-wrapper {
            order: 1; /* Menampilkan gambar di sebelah kanan untuk urutan ganjil */
        }

        .facility-section:nth-child(even) .facility-image-wrapper {
            order: -1; /* Menampilkan gambar di sebelah kiri untuk urutan genap */
        }

        @media (max-width: 768px) {
            .facility-section {
                flex-direction: column;
            }

            .facility-content h3 {
                text-align: center;
            }

            .facility-content p {
                text-align: center;
            }
        }
    </style>

</head>

@extends('layouts.app')

@section('title', 'Daftar Fasilitas')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Daftar Fasilitas</h2>

        @foreach ($facilities as $facility)
            <div class="facility-section">
                <div class="facility-image-wrapper">
                    <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" class="facility-image">
                </div>
                <div class="facility-content">
                    <h3>{{ $facility->name }}</h3>
                    <p>{{ $facility->description }}</p>
                </div>
            </div>
        @endforeach
    </div>

@endsection
