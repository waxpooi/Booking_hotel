<head>
    <style>
        /* ===== Background Body ===== */
        body {
            background-image: url('/image/back.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* ===== Header Section ===== */
        .header {
            background-image: url('/image/header-bg.jpg');
            background-size: cover;
            background-position: center;
            padding: 120px 0;
            text-align: center;
            color: rgb(255, 255, 255);
            position: relative;
        }

        .header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .header p {
            font-size: 1.2rem;
            margin-bottom: 25px;
        }

        .header .btn {
            padding: 15px 30px;
            font-size: 18px;
            background: linear-gradient(45deg, #b8860b, #ffd700);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(255, 215, 0, 0.5);
            transition: background 0.3s ease-in-out, transform 0.2s;
        }

        .header .btn:hover {
            background: linear-gradient(45deg, #ffd700, #b8860b);
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 215, 0, 0.7);
        }

        .header .btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.4);
        }

        /* ===== Tentang Kami Section ===== */
        .tentang-kami {
            max-width: 1100px;
            margin: 40px auto;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: justify;
            transform: rotate(-2deg);
            transition: transform 0.3s ease-in-out;
        }

        .tentang-kami h2 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .tentang-kami p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.6;
        }

        /* ===== Fasilitas Section ===== */
        .fasilitas {
            background: #f8f9fa;
            padding: 50px 0;
        }

        .fasilitas h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .fasilitas .card {
            border-radius: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .fasilitas .card:hover {
            transform: scale(1.05);
        }

        .fasilitas .fasilitas-img {
            border-radius: 15px 15px 0 0;
            height: 200px;
            object-fit: cover;
        }

        /* ===== Footer Section ===== */
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 30px 0;
            font-size: 1rem;
        }
    </style>
</head>

@extends('layouts.app')

@section('content')
    <section class="header-section">
        <div class="header">
            <h1>Selamat Datang di HOTEL WAXPOO</h1>
            <p>Nikmati kenyamanan dan kemewahan dengan fasilitas terbaik.</p>
            <a href="{{ url('rooms') }}" class="btn">PESAN SEKARANG</a>
        </div>
    </section>


    <section class="tentang-kami-section">
        <div class="tentang-kami">
            <h2>Tentang Kami</h2>
            <p>Hotel Waxpoo adalah sebuah hotel bintang 5 yang menawarkan pelayanan terbaik dan fasilitas mewah, di mana
                setiap tamu diperlakukan seperti raja. Dengan lokasi yang strategis di jantung kota, Hotel Waxpoo tidak
                hanya memberikan kenyamanan, tetapi juga akses mudah ke berbagai atraksi wisata penting.</p>
            <p>Atmosfer yang mewah dari hotel ini segera menyambut setiap pengunjung, dengan desain interior yang elegan
                dan modern. Ketika Anda memasuki lobi, Anda akan disambut oleh gaya arsitektur yang klasik dan
                kontemporer, lengkap dengan lampu gantung yang megah dan furnitur yang menawan.</p>
        </div>
    </section>


    <section class="fasilitas-section">
        <div class="fasilitas">
            <h2>Fasilitas Kami</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="/image/kolam_renang.jpg" class="card-img-top fasilitas-img" alt="Kolam Renang">
                        <div class="card-body">
                            <h5 class="card-title">Kolam Renang</h5>
                            <p class="card-text">Nikmati kolam renang eksklusif dengan pemandangan yang indah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="/image/spa.jpg" class="card-img-top fasilitas-img" alt="Spa & Wellness">
                        <div class="card-body">
                            <h5 class="card-title">Spa & Wellness</h5>
                            <p class="card-text">Nikmati perawatan spa terbaik untuk relaksasi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="/image/gym.jpg" class="card-img-top fasilitas-img" alt="Gym">
                        <div class="card-body">
                            <h5 class="card-title">Pusat Kebugaran</h5>
                            <p class="card-text">Fasilitas gym modern dengan alat terbaik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="/image/restoran.jpg" class="card-img-top fasilitas-img" alt="Restoran">
                        <div class="card-body">
                            <h5 class="card-title">Restoran Mewah</h5>
                            <p class="card-text">Hidangan lezat dari chef profesional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="/image/lounge.jpg" class="card-img-top fasilitas-img" alt="Lounge Mewah">
                        <div class="card-body">
                            <h5 class="card-title">Lounge Mewah</h5>
                            <p class="card-text">Tempat santai elegan dengan pelayanan premium.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer">
        <p>&copy; ini hotelnya si waxpoo</p>
    </footer>
@endsection
