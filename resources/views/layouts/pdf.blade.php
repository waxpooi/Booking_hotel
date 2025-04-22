<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
            color: #000;
            line-height: 1.5;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
