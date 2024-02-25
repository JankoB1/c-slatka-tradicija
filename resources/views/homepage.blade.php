@extends('layouts.app')

@section('content')
    <section id="main-banner">
        <div class="main-banner-inner">
            <h1>Učestvuj u konkursu<br>"Torte i kolači sa<br>pudingom"</h1>
            <a href="#">Nagradni konkus</a>
        </div>
    </section>

    <section id="featured-recipes">
        <div class="featured-recipes-inner container-space">
            <h2>Najpopularniji recepti</h2>
            <p>Izdvojili smo za vas najpopularnije recepte po izboru C Slatka tradicija tima. Uživajte u pripremi i javite nam utiske!</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="featured-recipe-single mini">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('images/f1.png') }}');"></div>
                                <p>Torta sa borovnicama</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="featured-recipe-single mini">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('images/f2.png') }}');"></div>
                                <p>Torta sa borovnicama</p>
                            </div>
                        </div>
                    </div>
                    <div class="featured-recipe-single">
                        <div class="featured-image-cont" style="background-image: url('{{ asset('images/f4.png') }}');"></div>
                        <p>Torta sa borovnicama</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="featured-recipe-single big">
                        <div class="featured-image-cont" style="background-image: url('{{ asset('images/f3.png') }}');"></div>
                        <p>Torta sa borovnicama</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="featured-recipe-single">
                        <div class="featured-image-cont" style="background-image: url('{{ asset('images/f5.png') }}');"></div>
                        <p>Torta sa borovnicama</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="featured-recipe-single">
                        <div class="featured-image-cont" style="background-image: url('{{ asset('images/f6.png') }}');"></div>
                        <p>Torta sa borovnicama</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="homepage-banner">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h3>Tvoj sladak začin <br>još od 1976. godine</h3>
                    <p>Kada se najbliži okupe i sa osmesima uživaju u najlepšim trenucima uz omiljene ukuse, tada je jasno zašto decenijama duga tradicija čini C proizvode neizostavnim delom svake trpeze.</p>
                    <a href="#">Proizvodi</a>
                </div>
            </div>
        </div>
    </section>

    <section id="action">
        <div class="action-inner container-space">
            <h2>Vreme je za akciju</h2>
            <p>Izaberi kategoriju, pogledaj recepte koji smo izdvojili<br>za tebe i upusti se u kulinarsku avanturu</p>
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

    <section id="homepage-banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>AKTIVNI NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Torte i kolači sa<br>pudingom"</h3>
                    <a href="#">Nagradni konkursi</a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script type="text/javascript" src="{{ asset('js/homepage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/categories-filter.js') }}"></script>
@endsection
