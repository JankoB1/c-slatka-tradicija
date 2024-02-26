@extends('layouts.app')

@section('content')

    <section id="about-hero">

    </section>

    <div id="about">
        <div class="about-inner container-space">
            <h1>O nama</h1>
            <p>Porodične vrednosti su ono što život čini lepšim. Kada se najbliži okupe i sa osmesima uživaju u najlepšim trenucima uz omiljene ukuse, tada je jasno zašto decenijama duga tradicija čini C Slatka tradicija proizvode neizostavnim delom svake trpeze.</p>
            <div class="about-images">
                <img src="{{ asset('images/about1.png') }}" alt="about">
                <img src="{{ asset('images/about2.png') }}" alt="about">
                <img src="{{ asset('images/about3.png') }}" alt="about">
            </div>
            <p>Naši proizvodi su generacijama unazad neizostavni saveznici u kuhinji. Za kolače, torte i domaća peciva, za posebna slavlja ili svakodnevna uživanja zajedno kreiramo ukuse kojima se cela porodica raduje.
                <br>Zajedno smo tu da najlepše ukuse slatke tradicije sačuvamo od zaborava!</p>
            <p>Davne 1947. osnovana je kompanija Centroprom, odnosno Centroproizvod kao proizvodni deo kompanije. Dr. Oetker d.o.o. je 2011. godine akvizicijom preuzeo slatki praškasti asortiman Centroproizvoda kao i proizvodnju oblandi. Godinama pažljivo osluškujemo potrebe potrošača i prilagođavamo asortiman proizvoda čime osvajamo njihova srca i zadržavamo lidersku poziciju na tržištu.</p>
        </div>
    </div>

    <section id="action" class="about-action">
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


@endsection
