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
                            @if(isset($recipes[0]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[0]->category_slug, 'slug' => $recipes[0]->recipe_slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[0]->image) }}');"></div>
                                        <p>{{ $recipes[0]->recipe_title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(isset($recipes[1]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[1]->category_slug, 'slug' => $recipes[1]->recipe_slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[1]->image) }}');"></div>
                                        <p>{{ $recipes[1]->recipe_title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                    @if(isset($recipes[2]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[2]->category_slug, 'slug' => $recipes[2]->recipe_slug]) }}">
                            <div class="featured-recipe-single">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[2]->image) }}');"></div>
                                <p>{{ $recipes[2]->recipe_title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    @if(isset($recipes[3]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[3]->category_slug, 'slug' => $recipes[3]->recipe_slug]) }}">
                            <div class="featured-recipe-single big">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[3]->image) }}');"></div>
                                <p>{{ $recipes[3]->recipe_title }}</p>
                            </div>
                        </a>
                    @endif
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
                    @if($singleProduct->id != $product->id && $singleProduct->active == 'T')
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
