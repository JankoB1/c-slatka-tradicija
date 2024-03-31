@extends('layouts.app')

@section('content')
    <section id="recipes-category-banner"></section>

    <section id="action" class="recipes-action">
        <div class="action-inner container-space">
            <h2>Recepti</h2>
            <p>Slatku tradiciju stvaramo zajedno. Zato su na našem sajtu najbolji recepti dostupni svima. Odlučite se za proverene bakine recepte koje voli cela porodica ili isprobajte brze i jednostavne nove recepte. Uz praktične savete naših domaćica priprema poslastica postaje pravo uživanje. Budite i vi deo tradicije koja inspiriše. Upotpunite naš kuvar svojim originalnim receptom i podelite svoje kulinarske tajne za pripremu omiljenih deserata.</p>
            <a href="{{ route('recipes.create') }}" class="mobile-send-cta mobile">Pošaljite recept</a>
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
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladne-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-1"></div>
                                    <p class="subcategory-title">Čokoladne torte</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-2"></div>
                                    <p class="subcategory-title">Voćne torte</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-3"></div>
                                    <p class="subcategory-title">Kremaste torte</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Kolači</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sitni-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-4"></div>
                                    <p class="subcategory-title">Sitni kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocni-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-5"></div>
                                    <p class="subcategory-title">Voćni kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladni-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-6"></div>
                                    <p class="subcategory-title">Čokoladni kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremasti-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-7"></div>
                                    <p class="subcategory-title">Kremasti kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'recepti-za-oblande']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-8"></div>
                                    <p class="subcategory-title">Oblande</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'biskvitni-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-9"></div>
                                    <p class="subcategory-title">Biskvitni kolači</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Hleb i <br>peciva</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <a href="{{ route('show-recipe-category', ['slug' => 'hleb-i-pogace']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-10"></div>
                                    <p class="subcategory-title">Hleb i pogače</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-peciva']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-11"></div>
                                    <p class="subcategory-title">Slatka peciva</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slana-peciva']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-12"></div>
                                    <p class="subcategory-title">Slana peciva</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'predjela']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-13"></div>
                                    <p class="subcategory-title">Predjela</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Zimnica</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-zimnica']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-14"></div>
                                    <p class="subcategory-title">Slatka zimnica</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kisela-zimnica']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-15"></div>
                                    <p class="subcategory-title">Kisela zimnica</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Deserti</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sladoled']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-16"></div>
                                    <p class="subcategory-title">Sladoled</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-salate-i-kupovi']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-17"></div>
                                    <p class="subcategory-title">Voćne salate i kupovi</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'deserti-u-casi']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-18"></div>
                                    <p class="subcategory-title">Deserti u čaši</p>
                                </div>
                            </a>
                        </div>
                    </div>
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

@section('scriptsBottom')
    <script type="text/javascript" src="{{ asset('js/categories-filter.js') }}"></script>
@endsection
