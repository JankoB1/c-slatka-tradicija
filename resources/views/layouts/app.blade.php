<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>C Slatka Tradicija | @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('scriptsTop')
</head>
<body>

<header id="main-header">
    <nav>
        <a href="{{ route('show-homepage') }}">
            <img src="{{ asset('images/logo-c.png') }}" alt="c logo">
        </a>
        <ul>
            <li><a href="#">O nama</a></li>
            <li><a href="{{ route('show-all-categories') }}">Proizvodi</a></li>
            <li><a href="{{ route('recipes.retrieve') }}">Recepti</a></li>
            <li><a href="#">Priče iz C sveta</a></li>
            <li><a href="#">Nagradni konkursi</a></li>
            <li><a href="{{ route('show-recipe-book') }}">Moja knjižica recepata</a></li>
        </ul>
        <div class="header-buttons">
            @guest()
                <a href="{{ route('login') }}" class="login-btn">Prijavi se</a>
            @else
                <a href="{{ route('logout') }}" class="login-btn">Odjavi se</a>
            @endguest
            <a href="{{ route('recipes.create') }}" class="add-recipe">Dodaj recept</a>
        </div>
    </nav>
</header>
    <main>
        @yield('content')
    </main>

<footer>
    <img src="{{ asset('images/logo-c.png') }}" alt="logo c" class="logo-footer">
    <div class="socials">
        <a href="#">
            <img src="{{ asset('images/ig.svg') }}" alt="ig">
        </a>
        <a href="#">
            <img src="{{ asset('images/yt.svg') }}" alt="yt">
        </a>
        <a href="#">
            <img src="{{ asset('images/fb.svg') }}" alt="fb">
        </a>
    </div>

    <ul>
        <li><a href="#">Kontakt</a></li>
        <li><a href="#">Impressum</a></li>
        <li><a href="#">Pravna Napomena</a></li>
        <li><a href="#">Politika Zaštite Podataka</a></li>
        <li><a href="#">Mapa sajta</a></li>
    </ul>

    <p>C Slatka Tradicija © 2024 · Sva prava zadržana.</p>
</footer>

@yield('scriptsBottom')
</body>
</html>
