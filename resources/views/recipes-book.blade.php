@extends('layouts.app')

@section('content')

    <section id="recipe-book-hero"></section>

    <section id="recipe-book-content">
        <div class="recipe-book-content-inner container-space">
            <h2>Moja knjižica recepata</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa. Cras interdum porttitor sapien ac congue.</p>
            <a href="#">Pogledaj sve recepte</a>
            <div class="row">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa. Cras interdum porttitor sapien ac congue. </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/knjiga1.png') }}" alt="recipe book">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/knjiga2.png') }}" alt="recipe book">
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa. Cras interdum porttitor sapien ac congue. </p>
                </div>
            </div>
        </div>
    </section>

    <section id="recipe-book-categories">
        <div class="recipe-book-categories-inner container-space">
            <h3>C Slatka tradicija knjižice recepata</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="book-recipe-cont" style="background-image: url('{{ asset('images/knjiga-kategorija1.png') }}');">
                        <p>Recepti za<br>slavsku trpezu</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="book-recipe-cont" style="background-image: url('{{ asset('images/knjiga-kategorija2.png') }}');">
                        <p>Recepti za<br>praznične dane</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="book-recipe-cont" style="background-image: url('{{ asset('images/knjiga-kategorija3.png') }}');">
                        <p>Recepti za<br>letnje dane</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="book-recipe-cont" style="background-image: url('{{ asset('images/knjiga-kategorija4.png') }}');">
                        <p>Brzi recepti za<br>"stižu gosti"</p>
                    </div>
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
