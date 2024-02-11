@extends('layouts.app')

@section('content')
    <section id="single-product-main">
        <div class="single-product-main-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h1>{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}">
                </div>
            </div>
        </div>
    </section>

    <section id="single-product-guide">
        <div class="single-product-guide-inner container-space">
            <h2>Uputstvo za pripremu</h2>
            <p>{{ $product->product_guide }}</p>
            <a href="#">Nutritivne vrednosti</a>
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

    <section id="single-category-products">
        <div class="single-category-products-inner container-space">
            <h2>Potrebno ti je još inspiracije</h2>
            <p>Bez brige! Naša C Slatka tradicija porodica nudi širok izbora proizvoda, a brza i jednostavna priprema olakšaće svako upuštanje u novu kulinarsku avanturu. </p>
            <div class="category-products">
                @foreach($products as $singleProduct)
                    @if($singleProduct->id != $product->id)
                        <div class="single-product">
                            <a href="{{ route('show-single-product', ['slug' => $singleProduct->slug]) }}">
                                <img src="{{ asset('images/' . $singleProduct->image_path) }}" alt="">
                                <p>{{ $singleProduct->name }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
