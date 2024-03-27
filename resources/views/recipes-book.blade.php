@extends('layouts.app')

@section('content')

    <section id="recipe-book-hero"></section>

    <section id="recipe-book-content">
        <div class="recipe-book-content-inner container-space">
            <h2>Moja knjižica recepata</h2>
            <p>Izaberite recepte koji vam se najviše dopadaju, napravite svoju knjižicu recepata i preuzmite je potpuno besplatno.</p>
            <a href="#">Pogledaj sve recepte</a>
            <img class="books-img desktop" src="{{ asset('images/books-image.png') }}" alt="books">
            <img src="{{ asset('images/book-mobile-icons.png') }}" alt="books" class="books-img mobile">
            <div class="row desktop">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa. Cras interdum porttitor sapien ac congue. </p>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa. Cras interdum porttitor sapien ac congue. </p>
                </div>
            </div>
        </div>
    </section>

    <section id="recipe-book-mobile" class="mobile">
        <img src="{{ asset('images/rb1.png') }}" alt="rb" class="rb-mobile">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa. Cras interdum porttitor sapien ac congue.</p>
        <img src="{{ asset('images/rb2.png') }}" alt="rb" class="rb-mobile">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa. Cras interdum porttitor sapien ac congue. </p>
    </section>

    <section id="action" class="action-books">
        <div class="action-inner container-space">
            <h2>C Slatka tradicija knjižice recepata</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Fusce nec velit a orci malesuada fermentum id a massa.</p>
            <div class="categories-banners row">
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Recepti za<br>slavsku trpezu</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Recepti za<br>praznične dane</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Recepti za<br>letnje dane</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Brzi recepti za<br>"stižu gosti"</p>
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
                    <p>AKTIVNI NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Torte i kolači sa<br>pudingom"</h3>
                    <a href="{{ route('show-competition') }}">Nagradni konkursi</a>
                </div>
            </div>
        </div>
    </section>

@endsection
