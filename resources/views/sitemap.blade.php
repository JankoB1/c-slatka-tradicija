@extends('layouts.app')

@section('content')
    <section id="sitemap-hero">

    </section>

    <section id="sitemap-content">
        <div class="sitemap-content-inner container-space">
            <h2>Mapa sajta</h2>
            <div class="single-link">
                <a href="{{ route('show-homepage') }}">Početna</a>
            </div>
            <div class="single-link">
                <a href="#">O nama</a>
            </div>
            <div class="single-link">
                <p class="dropdown-trigger">Recepti <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                <div class="dropdown-links">
                    <div class="single-link-inner">
                        <p class="dropdown-trigger">Recepti za kolače <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                        <div class="dropdown-links">
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                        </div>
                    </div>
                    <div class="single-link-inner">
                        <p class="dropdown-trigger">Recepti za torte <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                        <div class="dropdown-links">
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                        </div>
                    </div>
                    <div class="single-link-inner">
                        <p class="dropdown-trigger">Recepti za oblande <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                        <div class="dropdown-links">
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                        </div>
                    </div>
                    <div class="single-link-inner">
                        <p class="dropdown-trigger">Recepti za slana peciva <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                        <div class="dropdown-links">
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                            <a href="#">Voćni kolač</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-link">
                <a href="#">Priče iz C sveta</a>
            </div>
            <div class="single-link">
                <a href="{{ route('show-competition') }}">Nagradni konkursi</a>
            </div>
            <div class="single-link">
                <a href="#">Moja knjižica recepata</a>
            </div>
            <div class="single-link">
                <a href="#">Dodaj recept</a>
            </div>
            <div class="single-link">
                <a href="#">Kontakt</a>
            </div>
            <div class="single-link">
                <a href="#">Impressum</a>
            </div>
            <div class="single-link">
                <a href="#">Pravna napomena</a>
            </div>
            <div class="single-link">
                <a href="#">Politika zaštite podataka</a>
            </div>
            <div class="single-link">
                <a href="#">Mapa sajta</a>
            </div>
        </div>
    </section>

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/homepage-banner2-mobile.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>AKTIVNI NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Torte i kolači sa<br>pudingom"</h3>
                    <a href="{{ route('show-competition') }}">Nagradni konkursi</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/sitemap.js') }}"></script>
@endsection
