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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
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
            <li><a href="{{ route('show-about') }}">O nama</a></li>
            <li>
                <a href="{{ route('show-all-categories') }}">Proizvodi</a>
                <ul>
                    <li><a href="{{ route('show-single-category', ['slug' => 'dodaci-za-kolace']) }}">Dodaci za kolače</a></li>
                    <li><a href="{{ route('show-single-category', ['slug' => 'puding']) }}">Puding</a></li>
                    <li><a href="{{ route('show-single-category', ['slug' => 'slag-kremovi']) }}">Šlag i šlag krem</a></li>
                    <li><a href="{{ route('show-single-product', ['slug' => 'psenicni-griz-400g']) }}">Griz</a></li>
                    <li><a href="{{ route('show-single-product', ['slug' => 'oblande']) }}">Oblande</a></li>
                    <li><a href="{{ route('show-single-category', ['slug' => 'eskimko']) }}">Eskimko</a></li>
                    <li><a href="{{ route('show-single-category', ['slug' => 'zimnica']) }}">Zimnica</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('show-all-recipes') }}">Recepti</a>
                <ul>
                    <li>
                        <a href="#" class="has-dropdown">Recepti za kolače <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sitni-kolaci']) }}">Sitni kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocni-kolaci']) }}">Voćni kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladni-kolaci']) }}">Čokoladni kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremasti-kolaci']) }}">Kremasti kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'biskvitni-kolaci']) }}">Biskvitni kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'oblande']) }}">Oblande</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="has-dropdown">Recepti za torte <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladne-torte']) }}">Čokoladne torte</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-torte']) }}">Voćne torte</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">Kremaste torte</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="has-dropdown">Recepti za hleb i peciva <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'hleb-i-pogace']) }}">Hleb i pogače</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-peciva']) }}">Slatka peciva</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slana-peciva']) }}">Slana peciva</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'predjela']) }}">Predjela</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="has-dropdown">Recepti za zimnicu <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-zimnica']) }}">Slatka zimnica</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kisela-zimnica']) }}">Kisela zimnica</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="has-dropdown">Recepti za deserte <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sladoled']) }}">Sladoled</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-salate-i-kupovi']) }}">Voćne salate i kupovi</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'deserti-u-casi']) }}">Deserti u čaši</a>
                        </div>
                    </li>
                    <li><a href="{{ route('show-recipe-category', ['slug' => 'ostali-recepti']) }}">Ostali recepti</a></li>
                </ul>
            </li>
            <li><a href="#">Priče iz C sveta</a></li>
            <li><a href="{{ route('show-competition') }}">Nagradni konkursi</a></li>
            <li><a href="{{ route('show-recipe-book') }}">Moja knjižica recepata</a></li>
        </ul>
        <div class="header-buttons">
            @guest()
                <a href="{{ route('login') }}" class="login-btn">Prijavi se</a>
            @endguest
            <a href="{{ route('recipes.create') }}" class="add-recipe">Dodaj recept</a>
            @auth()
                @if(Auth::user()->image_id != null)
                    <img src="{{ asset('images/' . Auth::user()->image_id) }}" alt="avatar" class="avatar-img">
                @else
                    <img src="{{ asset('images/avatar.png') }}" alt="avatar" class="avatar-img">
                @endif

                <div class="user-popup">
                    <p class="email">{{ Auth::user()->email }}</p>
                    @if(Auth::user()->image_id != null)
                        <img src="{{ asset('images/' . Auth::user()->image_id) }}" alt="avatar" class="avatar-img-popup">
                    @else
                        <img src="{{ asset('images/avatar.png') }}" alt="avatar" class="avatar-img-popup">
                    @endif
                    <p class="hello">Zdravo, {{ Auth::user()->name }}</p>
                    <a href="{{ route('show-profile') }}" class="my-profile-link">Moj profil</a>
                    <div class="list">
                        <a href="{{ route('show-profile') }}" class="single-list-item">
                            <p>Objavljeni recepti</p>
                            <img src="{{ asset('images/or-icon.svg') }}" alt="">
                        </a>
                        <a href="{{ route('show-profile') }}?saved" class="single-list-item">
                            <p>Sačuvani recepti</p>
                            <img src="{{ asset('images/sr-icon.svg') }}" alt="">
                        </a>
                        <a href="/logout" class="single-list-item">
                            <p>Odjavi se</p>
                            <img src="{{ asset('images/os-icon.svg') }}" alt="">
                        </a>
                    </div>
                </div>

            @endauth
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

<script>
    let avatarImg = document.querySelector('.avatar-img');
    if(avatarImg) {
        avatarImg.addEventListener('click', function() {
            document.querySelector('.user-popup').classList.toggle('active');
        });
    }
</script>
<script>
    let triggers = document.querySelectorAll('.has-dropdown');
    let dropdowns = document.querySelectorAll('.menu-dropdown');
    for(let i = 0; i < triggers.length; i++) {
        triggers[i].addEventListener('click', function() {
            dropdowns[i].classList.toggle('active');
        });
    }
</script>
@yield('scriptsBottom')
</body>
</html>
