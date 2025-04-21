<head>
    <style>
        /* Sidebar full dari atas ke bawah */
        .sidebar {
            width: 250px;
            background-color: #353535; /* Warna hitam */
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Agar footer sidebar tetap di bawah */
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            transition: all 0.3s ease; /* Efek transisi ketika sidebar mengubah ukuran */
        }

        /* Sidebar link */
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
            border-radius: 5px;
            margin-bottom: 10px; /* Spacing antar link */
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #2e2e2e;
            transform: translateX(5px); /* Sedikit geser ke kanan saat hover */
        }

        .sidebar h4 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffd700;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar hr {
            border-color: #bbb;
            margin-bottom: 15px;
        }

        /* Footer di sidebar */
        .sidebar div:last-child {
            margin-top: auto;
        }

        /* Responsif untuk perangkat mobile */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                padding: 15px;
            }
            .sidebar h4 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<div class="sidebar">
    <div>
        <h4>HOTEL WAXPOO</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    🏠 Halaman Utama
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rooms.rooms') }}" class="nav-link {{ request()->routeIs('room') ? 'active' : '' }}">
                    🏨 Kamar
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('facilities') }}" class="nav-link {{ request()->routeIs('facilities.index') ? 'active' : '' }}">
                    🏢 Fasilitas
                </a>
            </li>
        </ul>
    </div>

    <div>
        <hr>
        @auth
            <a href="#" onclick="document.getElementById('logout-form').submit();" class="nav-link">
                🚪 Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="nav-link">
                🔑 Login and register
            </a>
        @endauth
    </div>
</div>
