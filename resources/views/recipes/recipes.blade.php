@extends('layouts.app')

@section('content')
    <section id="recipes-category-banner"></section>

    <section id="action">
        <div class="action-inner container-space">
            <h2>Recepti</h2>
            <p>Slatku tradiciju zajedno stvaramo. Zato su na našem sajtu najbolji recepti dostupni svima. Odlučite se za proverene bakine recepte koje voli cela porodica ili isprobajte brze i jednostavne nove recepte. Uz praktične savete naših domaćica priprema poslastica postaje pravo uživanje. Budite i vi deo tradicije koja inspiriše. Upotpunite naš kuvar svojim originalnim receptom i podelite svoje kulinarske tajne za pripremu omiljenih deserata.</p>
            <div class="categories-banners row">
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Torte</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <div class="single-subcategory">
                                <div class="subcategory-img"></div>
                                <p class="subcategory-title">Čokoladne torte</p>
                            </div>
                            <div class="single-subcategory">
                                <div class="subcategory-img"></div>
                                <p class="subcategory-title">Čokoladne torte</p>
                            </div>
                            <div class="single-subcategory">
                                <div class="subcategory-img"></div>
                                <p class="subcategory-title">Čokoladne torte</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="single-category-banner">
                            <p>Kolači</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="single-category-banner">
                            <p>Hleb i<br>peciva</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="single-category-banner">
                            <p>Zimnica</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="single-category-banner">
                            <p>Deserti</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="homepage-banner">
        <img class="mobile" src="{{ asset('images/homepage-banner-mobile.png') }}" alt="homepage banner mobile">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h3>Tvoj sladak začin <br>još od 1976. godine</h3>
                    <p>Kada se najbliži okupe i sa osmesima uživaju u najlepšim trenucima uz omiljene ukuse, tada je jasno zašto decenijama duga tradicija čini C proizvode neizostavnim delom svake trpeze.</p>
                    <a href="{{ route('show-all-categories') }}">Proizvodi</a>
                </div>
            </div>
        </div>
    </section>

@endsection
