@extends('layouts.app')

@section('content')
    <section id="main-banner">
        <div class="main-banner-inner">
            <h1>Učestvuj u konkursu<br>Torte i kolači sa<br>Eskimko sladoledom</h1>
            <div class="search-cont">
                <input type="search" placeholder="Pretraži recept po imenu ili sastojku">
                <button>Pretraži</button>
            </div>
        </div>
    </section>

    <section id="featured-recipes">
        <div class="featured-recipes-inner container-space">
            <div class="title-row">
                <div class="title-line"></div>
                <h2>Najpopularniji recepti</h2>
                <button>Pogledaj sve</button>
            </div>
            <div class="recipes-categories">
                <span class="single-category">Torte (98)</span>
                <span class="single-category">Torte (98)</span>
                <span class="single-category">Torte (98)</span>
                <span class="single-category">Torte (98)</span>
                <span class="single-category">Torte (98)</span>
                <span class="single-category">Torte (98)</span>
            </div>
            <div class="recipes-list">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-recipe">
                            <div class="recipe-top-img"></div>
                            <div class="recipe-bottom-content">
                                <div class="recipe-title">
                                    <h3>Torta sa borovnicama</h3>
                                    <img src="{{ asset('images/empty-heart.svg') }}" alt="empty heart" class="empty-heart">
                                    <img src="{{ asset('images/full-heart.svg') }}" alt="full heart" class="full-heart">
                                </div>
                                <div class="recipe-details">
                                    <div class="advanced">
                                        <img src="{{ asset('images/settings.svg') }}" alt="settings">
                                        <span>Napredna priprema</span>
                                    </div>
                                    <div class="timing">
                                        <img src="{{ asset('images/time.svg') }}" alt="time">
                                        <span>20-30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-recipe">
                            <div class="recipe-top-img"></div>
                            <div class="recipe-bottom-content">
                                <div class="recipe-title">
                                    <h3>Torta sa borovnicama</h3>
                                    <img src="{{ asset('images/empty-heart.svg') }}" alt="empty heart" class="empty-heart">
                                    <img src="{{ asset('images/full-heart.svg') }}" alt="full heart" class="full-heart">
                                </div>
                                <div class="recipe-details">
                                    <div class="advanced">
                                        <img src="{{ asset('images/settings.svg') }}" alt="settings">
                                        <span>Napredna priprema</span>
                                    </div>
                                    <div class="timing">
                                        <img src="{{ asset('images/time.svg') }}" alt="time">
                                        <span>20-30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-recipe">
                            <div class="recipe-top-img"></div>
                            <div class="recipe-bottom-content">
                                <div class="recipe-title">
                                    <h3>Torta sa borovnicama</h3>
                                    <img src="{{ asset('images/empty-heart.svg') }}" alt="empty heart" class="empty-heart">
                                    <img src="{{ asset('images/full-heart.svg') }}" alt="full heart" class="full-heart">
                                </div>
                                <div class="recipe-details">
                                    <div class="advanced">
                                        <img src="{{ asset('images/settings.svg') }}" alt="settings">
                                        <span>Napredna priprema</span>
                                    </div>
                                    <div class="timing">
                                        <img src="{{ asset('images/time.svg') }}" alt="time">
                                        <span>20-30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-recipe">
                            <div class="recipe-top-img"></div>
                            <div class="recipe-bottom-content">
                                <div class="recipe-title">
                                    <h3>Torta sa borovnicama</h3>
                                    <img src="{{ asset('images/empty-heart.svg') }}" alt="empty heart" class="empty-heart">
                                    <img src="{{ asset('images/full-heart.svg') }}" alt="full heart" class="full-heart">
                                </div>
                                <div class="recipe-details">
                                    <div class="advanced">
                                        <img src="{{ asset('images/settings.svg') }}" alt="settings">
                                        <span>Napredna priprema</span>
                                    </div>
                                    <div class="timing">
                                        <img src="{{ asset('images/time.svg') }}" alt="time">
                                        <span>20-30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-recipe">
                            <div class="recipe-top-img"></div>
                            <div class="recipe-bottom-content">
                                <div class="recipe-title">
                                    <h3>Torta sa borovnicama</h3>
                                    <img src="{{ asset('images/empty-heart.svg') }}" alt="empty heart" class="empty-heart">
                                    <img src="{{ asset('images/full-heart.svg') }}" alt="full heart" class="full-heart">
                                </div>
                                <div class="recipe-details">
                                    <div class="advanced">
                                        <img src="{{ asset('images/settings.svg') }}" alt="settings">
                                        <span>Napredna priprema</span>
                                    </div>
                                    <div class="timing">
                                        <img src="{{ asset('images/time.svg') }}" alt="time">
                                        <span>20-30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-recipe">
                            <div class="recipe-top-img"></div>
                            <div class="recipe-bottom-content">
                                <div class="recipe-title">
                                    <h3>Torta sa borovnicama</h3>
                                    <img src="{{ asset('images/empty-heart.svg') }}" alt="empty heart" class="empty-heart">
                                    <img src="{{ asset('images/full-heart.svg') }}" alt="full heart" class="full-heart">
                                </div>
                                <div class="recipe-details">
                                    <div class="advanced">
                                        <img src="{{ asset('images/settings.svg') }}" alt="settings">
                                        <span>Napredna priprema</span>
                                    </div>
                                    <div class="timing">
                                        <img src="{{ asset('images/time.svg') }}" alt="time">
                                        <span>20-30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recipes-bottom">
                    <div class="title-line bottom-line"></div>
                    <button>Pogledaj još</button>
                </div>
            </div>
        </div>
    </section>

    <section id="homepage-banner">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h3>Tvoj sladak začin još od 1976. godine</h3>
                    <p>Kada se najbliži okupe i sa osmesima uživaju u najlepšim trenucima uz omiljene ukuse, tada je jasno zašto decenijama duga tradicija čini C proizvode neizostavnim delom svake trpeze.</p>
                    <a href="#">Pogledaj sve proizvode</a>
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
                    <a href="#">
                        <div class="single-category-banner">
                            <span>Zimnica</span>
                            <p>Recepti za ukusne<br>zimske specijalitete</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="single-category-banner">
                            <span>Zimnica</span>
                            <p>Recepti za ukusne<br>zimske specijalitete</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="single-category-banner">
                            <span>Zimnica</span>
                            <p>Recepti za ukusne<br>zimske specijalitete</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="single-category-banner">
                            <span>Zimnica</span>
                            <p>Recepti za ukusne<br>zimske specijalitete</p>
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
                    <p>AKTIVNI KONKURSI</p>
                    <h3>Učestvuj u konkursu<br>Torte i kolači sa<br>Eskimko sladoledom</h3>
                    <a href="#">Saznaj više</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptsBottom')
    <script type="text/javascript" src="{{ asset('js/homepage.js') }}"></script>
@endsection
