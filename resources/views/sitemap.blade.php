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
                <a href="{{ route('show-about') }}">O nama</a>
            </div>
            <div class="single-link">
                <p class="dropdown-trigger">Proizvodi <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                <div class="dropdown-links">
                    <div class="single-link-inner">
                        <a href="{{ route('show-single-category', ['slug' => 'dodaci-za-kolace']) }}">Dodaci za kolače</a>
                        <a href="{{ route('show-single-category', ['slug' => 'puding']) }}">Puding</a>
                        <a href="{{ route('show-single-category', ['slug' => 'slag-kremovi']) }}">Šlag i Šlag krem</a>
                        <a href="{{ route('show-single-product', ['slug' => 'psenicni-griz-400g']) }}">Griz</a>
                        <a href="{{ route('show-single-product', ['slug' => 'oblande']) }}">Oblande</a>
                        <a href="{{ route('show-single-category', ['slug' => 'eskimko']) }}">Eskimko</a>
                        <a href="{{ route('show-single-category', ['slug' => 'zimnica']) }}">Zimnica</a>
                    </div>
                </div>
            </div>
            <div class="single-link">
                <p class="dropdown-trigger">Recepti <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                <div class="dropdown-links">
                    <div class="single-link-inner">
                        <p class="dropdown-trigger">Recepti za kolače <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                        <div class="dropdown-links">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sitni-kolaci']) }}">Sitni kolač</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocni-kolaci']) }}">Voćni kolač</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladni-kolaci']) }}">Čokoladni kolač</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremasti-kolaci']) }}">Kremasti kolač</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'biskvitni-kolaci']) }}">Biskvitni kolač</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'recepti-za-oblande']) }}">Oblande</a>
                        </div>
                    </div>
                    <div class="single-link-inner">
                        <p class="dropdown-trigger">Recepti za torte <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                        <div class="dropdown-links">
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladne-torte']) }}">Čokoladne torte</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-torte']) }}">Voćne torte</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">Kremaste torte</a>
                        </div>
                    </div>
                    <div class="single-link-inner">
                        <p class="dropdown-trigger">Hleb i peciva <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                        <div class="dropdown-links">
                            <a href="{{ route('show-recipe-category', ['slug' => 'hleb-i-pogace']) }}">Hleb i pogače</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-peciva']) }}">Slatka peciva</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slana-peciva']) }}">Slana peciva</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'predjela']) }}">Predjela</a>
                        </div>
                    </div>
                    <div class="single-link-inner">
                        <p class="dropdown-trigger">Zimnica <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                        <div class="dropdown-links">
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-zimnica']) }}">Slatka zimnica</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kisela-zimnica']) }}">Kisela zimnica</a>
                        </div>
                    </div>
                    <div class="single-link-inner">
                        <p class="dropdown-trigger">Deserti <img src="{{ asset('images/arrow-down.svg') }}" alt="arrow down"></p>
                        <div class="dropdown-links">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sladoled']) }}">Sladoled</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-salate-i-kupovi']) }}">Voćne salate i kupovi</a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'deserti-u-casi']) }}">Deserti u čaši</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-link">
                <a href="{{ route('show-posts') }}">Blog</a>
            </div>
            <div class="single-link">
                <a href="{{ route('show-competition') }}">Nagradni konkursi</a>
            </div>
            <div class="single-link">
                <a href="{{ route('show-recipe-book') }}">Moja knjižica recepata</a>
            </div>
            <div class="single-link">
                <a href="{{ route('recipes.create') }}">Dodaj recept</a>
            </div>
            <div class="single-link">
                <a href="{{ route('show-contact') }}">Kontakt</a>
            </div>
            <div class="single-link">
                <a href="{{ route('show-impressum') }}">Impressum</a>
            </div>
            <div class="single-link">
                <a href="{{ route('show-privacy-note') }}">Pravna napomena</a>
            </div>
            <div class="single-link">
                <a href="{{ route('show-privacy-policy') }}">Politika zaštite podataka</a>
            </div>
            <div class="single-link">
                <a href="{{ route('show-sitemap') }}">Mapa sajta</a>
            </div>
        </div>
    </section>

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/konkurs-mobile-520x360-3.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Čokoladne torte i kolači"</h3>
                    <a href="{{ route('show-competition') }}">Nagradni konkursi</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/sitemap.js') }}"></script>
@endsection
