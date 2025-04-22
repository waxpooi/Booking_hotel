<head>
    <style>
        .navbar {
            background-color: transparent !important;
            padding: 15px 0;
            transition: background-color 0.3s ease;
            z-index: 999;
            position: absolute;
            width: 100%;
            top: 0;
            left: 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: white !important;
            margin-left: 12%;
        }

        .navbar-nav .nav-link {
            color: white !important;
            padding: 10px 15px;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            border-radius: 5px;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.8) !important;
            color: black !important;
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">HOTEL WAXPOO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rooms.rooms') }}">Kamar</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('facilities') }}">Fasilitas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tiket') }}">Tiketku</a></li>
            </ul>
        </div>
    </div>
</nav>
