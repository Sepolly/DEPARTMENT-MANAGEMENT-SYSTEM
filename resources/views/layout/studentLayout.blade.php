<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('fontawesome/fontawesome-free-6.4.0-web/css/all.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
    <title>EENG</title>
</head>

<body class = "mt-12">
    @include('partials.studentNavbar')
    @yield('content')
</body>
</html>