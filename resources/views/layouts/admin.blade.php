<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">

    <style>
        body {
            background-color: #f8f9fa;
            color: #000000;
        }

        .sidebar {
            background-color: #343a40;
            color: #fff;
            min-height: 100vh;
            padding: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            color: #f8d210;
        }

        .main-content {
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .main-content h1,
        .main-content h2,
        .main-content h3,
        .main-content h4,
        .main-content h5,
        .main-content h6,
        .main-content p,
        .main-content label,
        .main-content span,
        .main-content a {
            color: #000 !important;

        }

        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 sidebar">
                @include('layouts.partials._sidebar')
            </div>


            <div class="col-md-9 p-4">
                <div class="main-content">
                    <h2 class="mb-4">@yield('title')</h2>
                    @yield('content')
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col footer">
                @include('layouts.partials._footer')
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script> --}}
</body>

</html>
