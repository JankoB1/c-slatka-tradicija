@extends('layouts.app')

@section('content')
    <section id="single-category-banner" style="background-image: url('{{ asset('images/' . $category->image_path) }}');">

    </section>

    <section id="single-category-meta">
        <div class="single-category-meta container-space">
            <h1>{{ $category->name }}</h1>
            <p>{{ $category->description }}</p>
        </div>
    </section>

    <section id="single-category-products">
        <div class="single-category-products-inner container-space">
            <h2>Svi proizvodi</h2>
            <p>Pogledajte sve proizvode u okviru ove kategorije i pronađite inspiraciju za naredni recept koji ćete pripremati.</p>
            <div class="category-products">
                @foreach($products as $product)
                    <div class="single-product">
                        <a href="{{ route('show-single-product', ['slug' => $product->slug]) }}">
                            <img src="{{ asset('images/' . $product->image_path) }}" alt="">
                            <p>{{ $product->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="featured-recipes">
        <div class="featured-recipes-inner container-space">
            <h2>Vreme je za akciju</h2>
            <p>Pogledaj recepte koje smo izdvojili za tebe, a u kojima je korišćen neki od proizvoda iz ove kategorije.</p>
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
