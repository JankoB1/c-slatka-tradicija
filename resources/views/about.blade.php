@extends('layouts.app')

@section('content')

    <section id="about-hero">

    </section>

    <div id="about">
        <div class="about-inner container-space">
            <h1>O nama</h1>
            <p>Porodične vrednosti su ono što život čini lepšim. Kada se najbliži okupe i sa osmesima uživaju u najlepšim trenucima uz omiljene ukuse, tada je jasno zašto decenijama duga tradicija čini C Slatka tradicija proizvode neizostavnim delom svake trpeze.</p>
            <div class="about-images desktop">
                <img src="{{ asset('images/about-3-imgs-min.png') }}" alt="o nama" class="about-img3">
            </div>
            <img src="{{ asset('images/aboutm1.png') }}" alt="about" class="mobile about-mobile">
            <p>Naši proizvodi su generacijama unazad neizostavni saveznici u kuhinji. Za kolače, torte i domaća peciva, za posebna slavlja ili svakodnevna uživanja zajedno kreiramo ukuse kojima se cela porodica raduje.
                <br>Zajedno smo tu da najlepše ukuse slatke tradicije sačuvamo od zaborava!</p>
            <p>Davne 1947. osnovana je kompanija Centroprom, odnosno Centroproizvod kao proizvodni deo kompanije. Dr. Oetker d.o.o. je 2011. godine akvizicijom preuzeo slatki praškasti asortiman Centroproizvoda kao i proizvodnju oblandi. Godinama pažljivo osluškujemo potrebe potrošača i prilagođavamo asortiman proizvoda čime osvajamo njihova srca i zadržavamo lidersku poziciju na tržištu.</p>
            <img src="{{ asset('images/aboutm2.png') }}" alt="about" class="mobile about-mobile">
        </div>
    </div>

    <section id="action" class="about-action">
        <div class="action-inner container-space">
            <h2>Vreme je za akciju</h2>
            <p>Izaberi kategoriju, pogledaj recepte koji smo izdvojili za tebe i upusti se u kulinarsku avanturu!</p>
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
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-4"></div>
                                    <p class="subcategory-title">Sitni kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-5"></div>
                                    <p class="subcategory-title">Voćni kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-6"></div>
                                    <p class="subcategory-title">Čokoladni kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-7"></div>
                                    <p class="subcategory-title">Kremasti kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-8"></div>
                                    <p class="subcategory-title">Oblande</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">
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


@endsection
