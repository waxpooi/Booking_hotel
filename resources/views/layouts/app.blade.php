<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hotel Waxpoo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Tambahkan di dalam <head> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Pastikan body dan html memiliki tinggi penuh */
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Container utama menggunakan flexbox */
        .container-custom {
            display: flex;
            height: 100vh;
            /* Sidebar memenuhi seluruh tinggi viewport */
        }



        /* Bagian konten utama */
        .content {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
            /* Agar tidak tertimpa sidebar */
        }

        /* Footer */
        .footer {
            position:relative;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #000;
            color: white;
            padding: 15px;
            text-align: center;
        }
    </style>

</head>

<body>
    @include('layouts.navbar') <!-- Navbar tetap di atas -->

    <div class="container-custom">
        @include('layouts.sidebar') <!-- Sidebar tetap di kiri -->

        <div class="content">
            @yield('content') <!-- Konten berubah sesuai halaman -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
