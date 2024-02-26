<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>@yield('title-block')</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script href="{{ asset('/js/app.js') }}"></script>

    <!--  Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <!--  Bootstrap  -->
</head>
<body style="background: #0c5460">
    @include('inc.header')

    @yield('content')
</body>
</html>

