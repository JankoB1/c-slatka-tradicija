@extends('layouts.app')

@section('content')
{{--    <section id="single-category-banner" style="background-image: url('{{ asset('images/' . $category->image_path) }}');">--}}

{{--    </section>--}}

    <section class="desktop">
        <img src="{{ asset('images/' . $category->image_path) }}" alt="" style="width: 100%; margin-top: 100px;">
    </section>

    <section class="mobile">
        <img src="{{ asset('images/' . $category->image_path_mob) }}" alt="" style="width: 100%; margin-top: 60px;">
    </section>

    <section id="single-category-meta">
        <div class="single-category-meta container-space">
            <h1>{{ $category->name }}</h1>
            <p>{{ $category->description }}</p>
        </div>
    </section>

    <section id="single-category-products" class="{{ $category->slug == 'puding'? $category->slug: '' }}">
        <div class="single-category-products-inner container-space">
            <h2>Svi proizvodi</h2>
            <p>Pogledaj sve proizvode u okviru ove kategorije i pronađi inspiraciju za naredni recept koji ćeš pripremati.</p>
            <div class="category-products">
                @foreach($products as $product)
                    @if($product->active == 'T')
                        <div class="single-product">
                            <a href="{{ route('show-single-product', ['slug' => $product->slug]) }}">
                                <img src="{{ asset('images/' . $product->image_path) }}" alt="">
                                <p>{{ $product->name }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section id="featured-recipes">
        <div class="featured-recipes-inner container-space">
            <h2>Inspiriši se!</h2>
            <p>Izaberi kategoriju, pogledaj recepte koje smo izdvojili za vas i upustite se u kulinarsku avanturu.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            @if(isset($recipes[0]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[0]->category_slug, 'id' => $recipes[0]->id, 'slug' => $recipes[0]->recipe_slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[0]->image) }}');"></div>
                                        <p>{{ $recipes[0]->recipe_title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(isset($recipes[1]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[1]->category_slug, 'id' => $recipes[1]->id, 'slug' => $recipes[1]->recipe_slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[1]->image) }}');"></div>
                                        <p>{{ $recipes[1]->recipe_title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                    @if(isset($recipes[2]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[2]->category_slug, 'id' => $recipes[2]->id, 'slug' => $recipes[2]->recipe_slug]) }}">
                            <div class="featured-recipe-single">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[2]->image) }}');"></div>
                                <p>{{ $recipes[2]->recipe_title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    @if(isset($recipes[3]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[3]->category_slug, 'id' => $recipes[3]->id, 'slug' => $recipes[3]->recipe_slug]) }}">
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

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/konkurs-mobile-520x360-3.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Slavski kolači i torte"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
                </div>
            </div>
        </div>
    </section>

@endsection
