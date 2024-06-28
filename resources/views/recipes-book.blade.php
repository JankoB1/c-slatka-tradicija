@extends('layouts.app')

@section('content')

    <section>
        <img class="desktop" src="{{ asset('images/knjiga-recepata-herod.jpeg') }}" alt="" style="width: 100%; margin-top: 70px;">
        <img class="mobile" src="{{ asset('images/knjiga-recepata-hero.png') }}" alt="" style="width: 100%; margin-top: 70px;">
    </section>

    <section id="recipe-book-content">
        <div class="recipe-book-content-inner container-space">
            <h2>Moja knjižica recepata</h2>
            <p>Izaberi recepte koji ti se najviše dopadaju, napravi svoju knjižicu recepata i preuzmi je potpuno besplatno.</p>
            <a href="{{ route('show-all-recipes') }}">Pogledaj sve recepte</a>
            <img class="books-img desktop" src="{{ asset('images/books-image.png') }}" alt="books">
            <img src="{{ asset('images/book-mobile-icons.png') }}" alt="books" class="books-img mobile">
            <div class="row desktop">
                <div class="col-md-6">
                    <p>Recepti omiljenih poslastica se u mnogim porodicama prenose kroz generacije. Naša želja jeste da svima omogućimo da brzo i lako mogu sačuvati svoje omiljene recepte.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/knjiga1.png') }}" alt="recipe book">
                </div>
            </div>
            <div class="row desktop">
                <div class="col-md-6">
                    <img src="{{ asset('images/knjiga2.png') }}" alt="recipe book">
                </div>
                <div class="col-md-6">
                    <p>Upravo to i jeste C Slatka tradicija. Uspomene koje nosi stara sveska u fioci sa receptima koje je baka dala mami, a mama dopunila, a sada samo u digitalnom obliku. </p>
                </div>
            </div>
        </div>
    </section>

    <section id="recipe-book-mobile" class="mobile">
        <img src="{{ asset('images/rb1.png') }}" alt="rb" class="rb-mobile">
        <p>Trebaju ti brza rešenja? C Slatka tradicija tim ti je pripremio 4 već spremne knjižice recepata koje možeš preuzeti na svoj uređaj.</p>
        <img src="{{ asset('images/rb2.png') }}" alt="rb" class="rb-mobile">
{{--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa. Cras interdum porttitor sapien ac congue. </p>--}}
    </section>

    <section id="action" class="action-books">
        <div class="action-inner container-space">
            <h2>C Slatka tradicija knjižice recepata</h2>
            <p>Trebaju ti brza resenja? C Slatka tradicija tim ti je pripremio 4 vec spremne knjizice recepata koje mozeš preuzeti na svoj uredaj.</p>
            <div class="categories-banners row">
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Uskršnje <br>poslastice</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Tradicionalni <br>recepti</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Sitni <br>kolači</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Oblande</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/homepage-banner2-mobile.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Torte i kolači sa <br>Eskimko sladoledom"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
                </div>
            </div>
        </div>
    </section>

@endsection
