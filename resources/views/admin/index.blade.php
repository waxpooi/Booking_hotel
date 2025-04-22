<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">

    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">

            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="image/back.jpg" alt="">
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">WAXPOO</h5>
                                <span>ZUPER ADMIN</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <!-- Home -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">

                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <!-- Home -->

                <!-- fasilitas -->
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.facilities.index') }}">

                        <span class="menu-title">Crud Fasilitas hotel</span>
                    </a>
                    <!-- fasilitas -->

                    {{-- crud room --}}
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ route('admin.rooms.index') }}">

                        <span class="menu-title">CRUD ROOMS</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">

                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Search products">
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown border-left">

                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="notificationDropdown">
                                <h6 class="p-3 mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-calendar text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Event today</p>
                                        <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event
                                            today </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-danger"></i>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-link-variant text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Launch Admin</p>
                                        <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                                    </div>
                                </a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg"
                                        alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Haru</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                    </div>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- Tombol Logout -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-dark rounded-circle">
                                                <i class="mdi mdi-logout text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <p class="preview-subject mb-1">Log out</p>
                                        </div>
                                    </button>
                                </form>

                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Advanced settings</p>
                            </div>

                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                    </div>

                    <!-- Reservasi -->
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Order Status</h4>

                                    <form method="GET" action="{{ route('receptionist.reservations.search') }}">
                                        <div class="input-group mb-3">
                                            <input type="text" name="query" class="form-control"
                                                placeholder="Cari berdasarkan nama tamu"
                                                value="{{ request('query') }}">
                                            <button class="btn btn-primary" type="submit">Cari</button>
                                        </div>
                                    </form>

                                    <form method="GET" action="{{ route('receptionist.reservations.filter') }}">
                                        <div class="input-group mb-3">
                                            <input type="date" name="date" class="form-control"
                                                value="{{ request('date') }}">
                                            <button class="btn btn-secondary" type="submit">Filter Tanggal</button>
                                        </div>
                                    </form>


                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Email</th>
                                                    <th>Check-in</th>
                                                    <th>Check-out</th>
                                                    <th>Status</th>
                                                    <th>Payment Status</th>
                                                    <th>Payment Proof</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $reservation->id }}</td>
                                                        <td>{{ $reservation->email }}</td>
                                                        <td>{{ $reservation->check_in }}</td>
                                                        <td>{{ $reservation->check_out }}</td>
                                                        <td>{{ $reservation->status }}</td>
                                                        <td>{{ $reservation->payment_status }}</td>
                                                        <td>
                                                            @if ($reservation->payment_proof)
                                                                <a href="{{ asset('storage/payments/' . $reservation->payment_proof) }}"
                                                                    target="_blank">Lihat</a>
                                                            @else
                                                                Tidak ada
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($reservation->status !== 'Checked-in')
                                                                <form
                                                                    action="{{ route('receptionist.reservations.accept', $reservation->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit"
                                                                        class="btn btn-success btn-sm"
                                                                        onclick="return confirm('Yakin ingin menerima reservasi ini?')">Terima</button>
                                                                </form>

                                                                <form
                                                                    action="{{ route('receptionist.reservations.reject', $reservation->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Yakin ingin menolak dan menghapus reservasi ini?')">Tolak</button>
                                                                </form>
                                                            @else
                                                                <span class="badge bg-success">Checked-in</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Reservasi -->
                    <!-- Maps Section -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <!-- Tabel Data Pengunjung -->
                                        <!-- Google Maps -->
                                        <div class="col-md-7">
                                            <div id="audience-map" style="height: 400px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form untuk menyimpan nama kota -->
                    <form id="save-location-form" method="POST">
                        @csrf
                        <input type="hidden" id="city" name="city">
                    </form>

                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                                bootstrapdash.com 2020</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                    href="https://www.bootstrapdash.com/bootstrap-admin-template/"
                                    target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
                        </div>
                    </footer>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="assets/vendors/chart.js/Chart.min.js"></script>
        <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>

        <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <script src="assets/js/settings.js"></script>
        <script src="assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
        <!-- Google Maps API -->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7Gx3Xd8osZ-MXFKdL44YOtQOGx7aWnl8&libraries=places&callback=initMap"
            async defer></script>

        <script>
            let map;
            let markers = [];

            function initMap() {
                map = new google.maps.Map(document.getElementById("audience-map"), {
                    center: {
                        lat: 20.5937,
                        lng: 78.9629
                    },
                    zoom: 2
                });

                const countries = [{
                        name: "USA",
                        lat: 37.0902,
                        lng: -95.7129,
                        visitors: 1500,
                        percentage: "56.35%"
                    },
                    {
                        name: "Germany",
                        lat: 51.1657,
                        lng: 10.4515,
                        visitors: 800,
                        percentage: "33.25%"
                    },
                    {
                        name: "Australia",
                        lat: -25.2744,
                        lng: 133.7751,
                        visitors: 760,
                        percentage: "15.45%"
                    },
                    {
                        name: "United Kingdom",
                        lat: 55.3781,
                        lng: -3.4360,
                        visitors: 450,
                        percentage: "25.00%"
                    },
                    {
                        name: "Romania",
                        lat: 45.9432,
                        lng: 24.9668,
                        visitors: 620,
                        percentage: "10.25%"
                    },
                    {
                        name: "Brazil",
                        lat: -14.2350,
                        lng: -51.9253,
                        visitors: 230,
                        percentage: "75.00%"
                    }
                ];

                let tableBody = document.getElementById("country-data");

                countries.forEach((country, index) => {


                    marker.addListener("dragend", function(event) {
                        console.log(`${country.name} dipindahkan ke:`, event.latLng.lat(), event.latLng.lng());
                    });

                    markers.push(marker);


                    let row = `<tr>
                <td>${country.name}</td>
                <td class="text-right">${country.visitors}</td>
                <td class="text-right font-weight-medium">${country.percentage}</td>
            </tr>`;
                    tableBody.innerHTML += row;
                });
            }
        </script>
</body>

</html>
