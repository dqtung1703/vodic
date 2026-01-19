<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'VODIC'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lexend:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>
<body>
    @include('partials.gov-banner')
    @include('partials.header')
    @include('partials.login-modal')
    @include('partials.register-modal')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/enhancements.js') }}" defer></script>
</body>
</html>
