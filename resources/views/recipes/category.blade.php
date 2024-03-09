@extends('layouts.app')

@section('content')
    <section id="recipes-category-banner">
    </section>

    <section id="recipes-category-content">
        <div class="recipes-category-content container-space">
            <a href="{{ route('show-all-recipes') }}" class="all-categories-link"><img src="{{ asset('images/left-arrow.svg') }}" alt="left arrow">Sve kategorije recepata</a>
            <h1>{{ $category->name }}</h1>
            <div class="row">
                @foreach($recipes as $recipe)
                    <div class="col-md-4">
                        <a class="single-recipe-link" href="{{ route('show-single-recipe', ['slug' => $recipe->slug, 'category' => $category->slug]) }}">
                            <div class="single-recipe-preview">
                                @if(isset($recipe->images[0]) && $recipe->old_recipe == 0)
                                    <div class="recipe-preview-img" style="background-image: url('{{ asset('storage/upload/' . $recipe->images[0]->path) }}')">

                                    </div>
                                @elseif($recipe->old_recipe == 1)
                                    <div class="recipe-preview-img" style="background-image: url('{{ asset('storage/upload/' . $recipe->image_old) }}')">

                                    </div>
                                @endif
                                <p>{{ $recipe->title }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="pagination">
                    {{ $recipes->links() }}
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
