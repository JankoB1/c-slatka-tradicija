<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <title>C Slatka Tradicija | @yield('title')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('scriptsTop')
</head>
<body>

<header id="main-header" class="desktop">
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
                    <li><a href="{{ route('show-single-category', ['slug' => 'slag-kremovi']) }}">Šlag i Šlag krem</a></li>
                    <li><a href="{{ route('show-single-product', ['slug' => 'psenicni-griz-200g']) }}">Griz</a></li>
                    <li><a href="{{ route('show-single-product', ['slug' => 'oblande']) }}">Oblande</a></li>
                    <li><a href="{{ route('show-single-category', ['slug' => 'eskimko']) }}">Eskimko</a></li>
                    <li><a href="{{ route('show-single-category', ['slug' => 'zimnica']) }}">Zimnica</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('show-all-recipes') }}">Recepti</a>
                <ul>
                    <li>
                        <a href="#" class="has-dropdown">Kolači <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sitni-kolaci']) }}">Sitni kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocni-kolaci']) }}">Voćni kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladni-kolaci']) }}">Čokoladni kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremasti-kolaci']) }}">Kremasti kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'biskvitni-kolaci']) }}">Biskvitni kolači</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'recepti-za-oblande']) }}">Oblande</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="has-dropdown">Torte <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladne-torte']) }}">Čokoladne torte</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-torte']) }}">Voćne torte</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">Kremaste torte</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="has-dropdown">Hleb i peciva <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'hleb-i-pogace']) }}">Hleb i pogače</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-peciva']) }}">Slatka peciva</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slana-peciva']) }}">Slana peciva</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'predjela']) }}">Predjela</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="has-dropdown">Zimnica <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-zimnica']) }}">Slatka zimnica</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kisela-zimnica']) }}">Kisela zimnica</a>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="has-dropdown">Deserti <img src="{{ asset('images/menu-arrow.svg') }}" alt=""></a>
                        <div class="menu-dropdown">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sladoled']) }}">Sladoled</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-salate-i-kupovi']) }}">Voćne salate i kupovi</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'deserti-u-casi']) }}">Deserti u čaši</a>
                        </div>
                    </li>
                    <li><a href="{{ route('show-recipe-category', ['slug' => 'ostali-recepti']) }}">Ostali recepti</a></li>
                </ul>
            </li>
            <li><a href="{{ route('show-posts') }}">Blog</a></li>
            <li><a href="{{ route('show-competition') }}">Nagradni konkursi</a></li>
            <li class="book-recipe-link">
                <a href="{{ route('show-recipe-book') }}">Moja knjižica recepata</a>
                <div class="books-popup">
                    <div class="inner"></div>
                    <p class="download-book">Preuzmi knjižicu recepata</p>
                    <a href="{{ route('show-recipe-book') }}">Saznaj više</a>
                </div>
            </li>
            <li><span class="num">1</span></li>
        </ul>

        <div class="header-buttons">
            <img class="search-icon-desktop" src="{{ asset('images/search-mobile.svg') }}" alt="" style="width: 15px;">
            <div class="search-popup">
                <i class="fa-solid fa-xmark"></i>
                <input type="search">
                <input class="search-submit" type="submit" value="Pretraži">
            </div>
            @guest()
                <a href="{{ route('login') }}" class="login-btn">Prijavi se</a>
            @endguest
            <a href="{{ route('recipes.create') }}" class="add-recipe">Dodaj recept</a>
            @auth()
                @if(Auth::user()->image_path != null)
                    <div style="background-image: url('{{ asset('storage/' . Auth::user()->image_path) }}');" class="avatar-img"></div>
                @else
                    <div style="background-image: url('{{ asset('images/avatar.png') }}');" class="avatar-img"></div>
                @endif
{{--                @if(Auth::user()->image_id != null)--}}
{{--                    <img src="{{ asset('images/' . Auth::user()->image_id) }}" alt="avatar" class="avatar-img">--}}
{{--                @else--}}
{{--                    <img src="{{ asset('images/avatar.png') }}" alt="avatar" class="avatar-img">--}}
{{--                @endif--}}

                <div class="user-popup">
                    <p class="email">{{ Auth::user()->email }}</p>
                    @if(Auth::user()->image_path != null)
                        <div style="background-image: url('{{ asset('storage/' . Auth::user()->image_path) }}');" class="avatar-img-popup"></div>
                    @else
                        <div style="background-image: url('{{ asset('images/avatar.png') }}');" class="avatar-img-popup"></div>
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

<header id="main-header-mobile" class="mobile">
    <div class="mobile-actions">
        <img src="{{ asset('images/burger-mobile.svg') }}" alt="burger" class="burger-mobile">
        <a href="{{ route('show-homepage') }}">
            <img src="{{ asset('images/logo-c.png') }}" alt="c logo">
        </a>
        <div class="right-mob">
            <img src="{{ asset('images/search-mobile.svg') }}" alt="search" class="search-mobile">

            @guest()
                <a class="mobile-ps" href="{{ route('login') }}">Prijavi se</a>
            @endguest
                @auth()
                    <div class="user-info-mobile-row">
                        @if(Auth::user()->image_path != null)
                            <div style="background-image: url('{{ asset('storage/' . Auth::user()->image_path) }}');" class="avatar-img"></div>
                        @else
                            <div style="background-image: url('{{ asset('images/avatar.png') }}');" class="avatar-img"></div>
                        @endif
                    </div>


                    <div class="user-popup-mobile">
                        <div class="user-popup active">
                            <div class="user-popup-box">
                                <i class="fa-solid fa-xmark"></i>
                                @if(Auth::user()->image_path != null)
                                    <div style="background-image: url('{{ asset('storage/' . Auth::user()->image_path) }}');" class="avatar-img-popup"></div>
                                @else
                                    <div style="background-image: url('{{ asset('images/avatar.png') }}');" class="avatar-img-popup"></div>
                                @endif
                                <p class="hello2">{{ Auth::user()->name }} {{ Auth::user()->name }}</p>
                                <p class="email">{{ Auth::user()->email }}</p>
                                <a href="{{ route('show-profile') }}" class="my-profile-link">Moj profil</a>
                            </div>
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
                    </div>
                @endauth

{{--            <div class="books-mob">--}}
{{--                <img src="{{ asset('images/bell.svg') }}" alt="bell" class="bell">--}}
{{--                <span class="num"></span>--}}
{{--            </div>--}}
        </div>
    </div>

    <div class="search-popup-mobile">
        <div class="search-popup-mobile-inner">
            <i class="fa-solid fa-xmark"></i>
            <input class="mobile-search-input" type="search">
            <input class="search-submit" type="submit" value="Pretraži">
        </div>
    </div>

{{--    <div class="books-popup-mobile">--}}
{{--        <div class="books-popup-mobile-inner">--}}
{{--            <i class="fa-solid fa-xmark"></i>--}}
{{--            <h3>Moja knjižica recepata</h3>--}}
{{--            <div class="books-recipes">--}}

{{--            </div>--}}
{{--            <button>Preuzmi knjižicu recepata</button>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="main-header-mobile-inner">
        <div class="top-row">
            <a href="{{ route('show-homepage') }}">
                <img src="{{ asset('images/logo-c.png') }}" alt="c logo">
            </a>
            <i class="fa-solid fa-xmark"></i>
        </div>
{{--        <div class="btns-box">--}}
{{--            @guest()--}}
{{--                <a href="{{ route('login') }}">Prijavi se</a>--}}
{{--            @endguest--}}
{{--                @auth()--}}
{{--                    <div class="user-info-mobile-row">--}}
{{--                        @if(Auth::user()->image_path != null)--}}
{{--                            <div style="background-image: url('{{ asset('storage/' . Auth::user()->image_path) }}');" class="avatar-img"></div>--}}
{{--                        @else--}}
{{--                            <div style="background-image: url('{{ asset('images/avatar.png') }}');" class="avatar-img"></div>--}}
{{--                        @endif--}}
{{--                        <p class="hello">{{ Auth::user()->name }} {{ Auth::user()->name }}</p>--}}
{{--                        <img src="{{ asset('images/arrow-mobile-bottom.svg') }}" alt="arrow down">--}}
{{--                    </div>--}}

{{--                    <div class="user-popup-mobile">--}}
{{--                        <div class="user-popup active">--}}
{{--                            <div class="user-popup-box">--}}
{{--                                <i class="fa-solid fa-xmark"></i>--}}
{{--                                @if(Auth::user()->image_path != null)--}}
{{--                                    <div style="background-image: url('{{ asset('storage/' . Auth::user()->image_path) }}');" class="avatar-img-popup"></div>--}}
{{--                                @else--}}
{{--                                    <div style="background-image: url('{{ asset('images/avatar.png') }}');" class="avatar-img-popup"></div>--}}
{{--                                @endif--}}
{{--                                <p class="hello2">{{ Auth::user()->name }} {{ Auth::user()->name }}</p>--}}
{{--                                <p class="email">{{ Auth::user()->email }}</p>--}}
{{--                                <a href="{{ route('show-profile') }}" class="my-profile-link">Moj profil</a>--}}
{{--                            </div>--}}
{{--                            <div class="list">--}}
{{--                                <a href="{{ route('show-profile') }}" class="single-list-item">--}}
{{--                                    <p>Objavljeni recepti</p>--}}
{{--                                    <img src="{{ asset('images/or-icon.svg') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <a href="{{ route('show-profile') }}?saved" class="single-list-item">--}}
{{--                                    <p>Sačuvani recepti</p>--}}
{{--                                    <img src="{{ asset('images/sr-icon.svg') }}" alt="">--}}
{{--                                </a>--}}
{{--                                <a href="/logout" class="single-list-item">--}}
{{--                                    <p>Odjavi se</p>--}}
{{--                                    <img src="{{ asset('images/os-icon.svg') }}" alt="">--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endauth--}}
{{--            <a href="{{ route('recipes.create') }}">Dodaj recept</a>--}}
{{--        </div>--}}
        <div class="mobile-main-links">
            <div class="single-mobile-link">
                <a href="{{ route('show-about') }}">O nama <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
            </div>
            <div class="single-mobile-link">
                <a class="has-dropdown-mobile" href="{{ route('show-all-categories') }}">Proizvodi <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                <div class="dropdown-mobile">
                    <div class="single-mobile-link">
                        <a class="single-mobile-link-back" href="#"><img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"> Proizvodi</a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-all-categories') }}">Svi proizvodi <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-single-category', ['slug' => 'dodaci-za-kolace']) }}">Dodaci za kolače <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-single-category', ['slug' => 'puding']) }}">Puding <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-single-category', ['slug' => 'slag-kremovi']) }}">Šlag i Šlag krem <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-single-product', ['slug' => 'psenicni-griz-200g']) }}">Griz <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-single-product', ['slug' => 'oblande']) }}">Oblande <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-single-category', ['slug' => 'eskimko']) }}">Eskimko <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-single-category', ['slug' => 'zimnica']) }}">Zimnica <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                </div>
            </div>
            <div class="single-mobile-link">
                <a href="#" class="has-dropdown-mobile has-double-dropdown-mobile">Recepti <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                <div class="dropdown-mobile">
                    <div class="single-mobile-link">
                        <a class="single-mobile-link-back" href="#"><img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"> Recepti</a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-all-recipes') }}">Svi recepti <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                    <div class="single-mobile-link">

                        <a class="has-dropdown-mobile" href="#">Kolači <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                        <div class="dropdown-mobile">
                            <div class="single-mobile-link">
                                <a class="single-mobile-link-back" href="#"><img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"> Kolači</a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'sitni-kolaci']) }}">Sitni kolači <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'vocni-kolaci']) }}">Voćni kolači <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'cokoladni-kolaci']) }}">Čokoladni kolači <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'kremasti-kolaci']) }}">Kremasti kolači <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'biskvitni-kolaci']) }}">Biskvitni kolači <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'recepti-za-oblande']) }}">Oblande <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                        </div>
                    </div>
                    <div class="single-mobile-link">
                        <a href="#" class="has-dropdown-mobile">Torte <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                        <div class="dropdown-mobile">
                            <div class="single-mobile-link">
                                <a href="#" class="single-mobile-link-back"><img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"> Torte</a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'cokoladne-torte']) }}">Čokoladne torte <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'vocne-torte']) }}">Voćne torte <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">Kremaste torte <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                        </div>
                    </div>
                    <div class="single-mobile-link">
                        <a href="#" class="has-dropdown-mobile">Hleb i peciva <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                        <div class="dropdown-mobile">
                            <div class="single-mobile-link">
                                <a href="#" class="single-mobile-link-back"><img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"> Hleb i peciva</a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'hleb-i-pogace']) }}">Hleb i pogače <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'slatka-peciva']) }}">Slatka peciva <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'slana-peciva']) }}">Slana peciva <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'predjela']) }}">Predjela <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                        </div>
                    </div>
                    <div class="single-mobile-link">
                        <a href="#" class="has-dropdown-mobile">Zimnica <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                        <div class="dropdown-mobile">
                            <div class="single-mobile-link">
                                <a href="#" class="single-mobile-link-back"><img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"> Zimnica</a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'slatka-zimnica']) }}">Slatka zimnica <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'kisela-zimnica']) }}">Kisela zimnica <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                        </div>
                    </div>
                    <div class="single-mobile-link">
                        <a href="#" class="has-dropdown-mobile">Deserti <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                        <div class="dropdown-mobile">
                            <div class="single-mobile-link">
                                <a href="#" class="single-mobile-link-back"><img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"> Deserti</a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'sladoled']) }}">Sladoled <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'vocne-salate-i-kupovi']) }}">Voćne salate i kupovi <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                            <div class="single-mobile-link">
                                <a href="{{ route('show-recipe-category', ['slug' => 'deserti-u-casi']) }}">Deserti u čaši <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                            </div>
                        </div>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-recipe-category', ['slug' => 'ostali-recepti']) }}">Ostali recepti <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                </div>
            </div>
            <div class="single-mobile-link">
                <a href="{{ route('show-posts') }}">Blog <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
            </div>
            <div class="single-mobile-link">
                <a href="{{ route('show-competition') }}">Nagradni konkursi <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
            </div>
            <div class="single-mobile-link">
                <a class="has-dropdown-mobile" href="{{ route('show-recipe-book') }}">Moja knjižica recepata <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                <div class="dropdown-mobile">
                    <div class="single-mobile-link">
                        <a class="single-mobile-link-back" href="#"><img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"> Moja knjižica recepata</a>
                    </div>
                    <div class="single-mobile-link">
                        <a href="{{ route('show-recipe-book') }}">Pogledaj stranicu <img src="{{ asset('images/mobile-link.svg') }}" alt="arrow mobile"></a>
                    </div>
                    <div class="books-mobile-inner">
                        <h3 style="padding-top: 100px;">Moja knjižica recepata</h3>
                        <div class="books-recipes">

                        </div>
                        <button>Preuzmi knjižicu recepata</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <main>
        @yield('content')
    </main>

<footer>
    <img src="{{ asset('images/logo-c.png') }}" alt="logo c" class="logo-footer">
    <div class="socials">
        <a href="https://www.instagram.com/c.slatka.tradicija/">
            <img src="{{ asset('images/ig.svg') }}" alt="ig">
        </a>
        <a href="https://www.youtube.com/channel/UCBGzvKLk4aln7Dc899QOdIQ">
            <img src="{{ asset('images/yt.svg') }}" alt="yt">
        </a>
        <a href="https://www.facebook.com/C.slatka.tradicija/">
            <img src="{{ asset('images/fb.svg') }}" alt="fb">
        </a>
    </div>

    <ul>
        <li><a href="{{ route('show-contact') }}">Kontakt</a></li>
        <li><a href="{{ route('show-impressum') }}">Impressum</a></li>
        <li><a href="{{ route('show-privacy-note') }}">Pravna Napomena</a></li>
        <li><a href="{{ route('show-privacy-policy') }}">Politika Zaštite Podataka</a></li>
        <li><a href="{{ route('show-sitemap') }}">Mapa sajta</a></li>
    </ul>

    <p>C Slatka Tradicija © 2024 · Sva prava zadržana.</p>
</footer>
<script>
    document.querySelector('.burger-mobile').addEventListener('click', function() {
        document.querySelector('.main-header-mobile-inner').classList.add('active');
    });

    document.querySelector('.main-header-mobile-inner .top-row i').addEventListener('click', function() {
        document.querySelector('.main-header-mobile-inner').classList.remove('active');
    });

    document.querySelector('.user-info-mobile-row').addEventListener('click', function() {
        document.querySelector('.user-popup-mobile').classList.add('active');
    });

    document.querySelector('.user-popup-mobile i').addEventListener('click', function() {
        document.querySelector('.user-popup-mobile').classList.remove('active');
    });
</script>
<script>
    let mobileDropdownTriggers = document.querySelectorAll('.has-dropdown-mobile');
    mobileDropdownTriggers.forEach((mobileDropdownTrigger) => {
        mobileDropdownTrigger.addEventListener('click', function(e) {
            e.preventDefault();
            mobileDropdownTrigger.parentElement.querySelector('.dropdown-mobile').classList.add('active');
        });
    });

    let mobileDropdownTriggersBack = document.querySelectorAll('.single-mobile-link-back');
    mobileDropdownTriggersBack.forEach((mobileDropdownTriggerBack) => {
        mobileDropdownTriggerBack.addEventListener('click', function (e) {
            e.preventDefault();
            mobileDropdownTriggerBack.parentElement.parentElement.classList.remove('active');
        });
    });
</script>
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
        triggers[i].addEventListener('click', function(e) {
            e.preventDefault();
            this.classList.toggle('active');
            dropdowns[i].classList.toggle('active');
        });
    }
</script>
<script>
    let recipeIds = localStorage.getItem('recipeBooks') ? JSON.parse(localStorage.getItem('recipeBooks')) : [];
    if(recipeIds.length !== 0) {
        document.querySelectorAll('span.num')[0].innerText = recipeIds.length;
        document.querySelectorAll('span.num')[0].classList.add('active');
        document.querySelector('.books-mobile-inner').classList.add('active');
        // document.querySelectorAll('span.num')[1].innerText = recipeIds.length;
        // document.querySelectorAll('span.num')[1].classList.add('active');
    }

    let bookRecipeLink = document.querySelector('.book-recipe-link a');
    let bookRecipeDownload = document.querySelector('.download-book');
    let booksPopup = document.querySelector('.books-popup .inner');
    let booksMobilePopup = document.querySelector('.books-mobile-inner .books-recipes');
    let booksMobileToggle = document.querySelector('.books-mob');
    let bookRecipeDownloadMobile = document.querySelector('.books-mobile-inner button');

    bookRecipeDownload.addEventListener('click', function(e) {
        e.preventDefault();
        let recipeIdsNow = localStorage.getItem('recipeBooks') ? JSON.parse(localStorage.getItem('recipeBooks')) : [];
        let url = window.origin + '/pdf?';
        for(let i = 0; i < recipeIdsNow.length; i++) {
            url += `recipes[${i}]=${recipeIdsNow[i]}&`;
        }
        window.location.href = url;
    });

    bookRecipeDownloadMobile.addEventListener('click', function(e) {
        e.preventDefault();
        let recipeIdsNow = localStorage.getItem('recipeBooks') ? JSON.parse(localStorage.getItem('recipeBooks')) : [];
        let url = window.origin + '/pdf?';
        for(let i = 0; i < recipeIdsNow.length; i++) {
            url += `recipes[${i}]=${recipeIdsNow[i]}&`;
        }
        window.location.href = url;
    });

    document.querySelector('span.num').addEventListener('click', function(e) {
        e.preventDefault();
        if(e.target === this) {
            booksPopup.parentElement.classList.toggle('active');
        }
    });

    bookRecipeLink.addEventListener('click', function(e) {
        e.preventDefault();
        let recipeIdsNow = localStorage.getItem('recipeBooks') ? JSON.parse(localStorage.getItem('recipeBooks')) : [];
        if(recipeIdsNow.length === 0) {
            window.location.href = window.origin + '/moja-knjizica-recepata';
        } else {
            booksPopup.parentElement.classList.toggle('active');
        }
    });

    // booksMobileToggle.addEventListener('click', function(e) {
    //     e.preventDefault();
    //     booksMobilePopup.parentElement.parentElement.classList.add('active');
    // });

    // document.querySelector('.books-popup-mobile i').addEventListener('click', function(e) {
    //     e.preventDefault();
    //     booksMobilePopup.parentElement.parentElement.classList.remove('active');
    // });

    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: window.origin + '/get-recipes-by-ids',
        data: {
            recipes: recipeIds
        },
        method: 'GET',
        success: function(response) {
            response.forEach((recipe) => {
                let bookHtml = `<p data-recipe-id="${recipe.id}">${recipe.title}<i class="fa-solid fa-xmark"></i></p>`;
                booksPopup.innerHTML += bookHtml;
                booksMobilePopup.innerHTML += bookHtml;
            });

            let xs = document.querySelectorAll('.books-popup p i');
            let xsMobile = document.querySelectorAll('.books-mobile-inner p i');
            xs.forEach((x) => {
                x.addEventListener('click', function() {
                    let addToBookCheck = document.querySelector('.add-to-book');
                    if(addToBookCheck) {
                        addToBookCheck.click();
                    } else {
                        let id = x.parentElement.dataset.recipeId;
                        let i = recipeIds.indexOf(parseInt(id));
                        recipeIds.splice(i, 1);
                        localStorage.setItem('recipeBooks', JSON.stringify(recipeIds));
                        x.parentElement.remove();
                        document.querySelectorAll('span.num')[0].innerText = recipeIds.length;
                        document.querySelectorAll('span.num')[1].innerText = recipeIds.length;

                        document.querySelector('.books-mobile-inner p[data-recipe-id="' + id + '"]').remove();
                    }
                });
            });

            xsMobile.forEach((x) => {
                x.addEventListener('click', function() {
                    let addToBookCheck = document.querySelector('.add-to-book');
                    if(addToBookCheck) {
                        addToBookCheck.click();
                    } else {
                        let id = x.parentElement.dataset.recipeId;
                        let i = recipeIds.indexOf(parseInt(id));
                        recipeIds.splice(i, 1);
                        localStorage.setItem('recipeBooks', JSON.stringify(recipeIds));
                        x.parentElement.remove();
                        document.querySelectorAll('span.num')[0].innerText = recipeIds.length;
                        document.querySelectorAll('span.num')[1].innerText = recipeIds.length;

                        document.querySelector('.books-popup p[data-recipe-id="' + id + '"]').remove();
                    }
                });
            });
        }
    });
</script>
<script>
    let searchIcon = document.querySelector('img.search-icon-desktop');
    let searchPopup = document.querySelector('.search-popup');
    searchIcon.addEventListener('click', function() {
        searchPopup.classList.toggle('active');
    });

    let searchClose = document.querySelector('.search-popup i');
    searchClose.addEventListener('click', function() {
        searchPopup.classList.remove('active');
    });

    let searchSubmit = document.querySelector('input.search-submit');
    let searchField = document.querySelector('.search-popup input');
    searchSubmit.addEventListener('click', function() {
        window.location.href = window.origin + '/pretraga?keyword=' + searchField.value;
    });
</script>
<script>
    let searchIconMobile = document.querySelector('img.search-mobile');
    let searchPopupMobile = document.querySelector('.search-popup-mobile');
    searchIconMobile.addEventListener('click', function() {
        searchPopupMobile.classList.toggle('active');
    });

    let searchCloseMobile = document.querySelector('.search-popup-mobile i');
    searchCloseMobile.addEventListener('click', function() {
        searchPopupMobile.classList.remove('active');
    });

    let searchSubmitMobile = document.querySelector('.search-popup-mobile input.search-submit');
    let searchFieldMobile = document.querySelector('.search-popup-mobile input');
    searchSubmitMobile.addEventListener('click', function() {
        window.location.href = window.origin + '/pretraga?keyword=' + searchFieldMobile.value;
    });
</script>
@yield('scriptsBottom')
</body>
</html>
