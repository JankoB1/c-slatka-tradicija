@extends('layouts.app')

@section('content')
    <section>
        <img class="desktop" src="{{ asset('images/category-single1.png') }}" alt="" style="width: 100%; margin-top: 70px;">
        <img class="mobile" src="{{ asset('images/recipes-mobile.png') }}" alt="" style="width: 100%; margin-top: 70px;">
    </section>

    <section id="recipes-category-content">
        <div class="recipes-category-content container-space">
            <a href="{{ route('show-all-recipes') }}" class="all-categories-link"><img src="{{ asset('images/left-arrow.svg') }}" alt="left arrow">Sve kategorije recepata</a>
            <h1>Pretraga: {{ $keyword }}</h1>
            <a href="{{ route('recipes.create') }}" class="mobile-send-cta mobile">Pošaljite recept</a>
            <div class="row">
                @foreach($recipes as $recipe)
                    <div class="col-md-4">
                        <a class="single-recipe-link" href="{{ route('show-single-recipe', ['id' => $recipe->id, 'category' => $recipe->category->slug, 'slug' => $recipe->slug]) }}">
                            <div class="single-recipe-preview">
                                @if(isset($recipe->images[0]) && $recipe->old_recipe == 0)
                                    <div class="recipe-preview-img" style="background-image: url('{{ asset('storage/upload/' . $recipe->images[0]->path) }}')">

                                    </div>
                                @elseif($recipe->old_recipe == 1)
                                    <div class="recipe-preview-img" style="background-image: url('{{ asset('storage/upload/' . $recipe->image_old) }}')">

                                    </div>
                                @else
                                    <div class="recipe-preview-img" style="background-image: url('{{ asset('images/recipe-no-image.png') }}"></div>
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
                    <h3>Vaš omiljeni obrok <br>još od detinjstva</h3>
                    <p>Za stare i mlade, za one koji vole ukuse detinjstva. Dečak sa pakovanja je dobro poznat svima i generacijama unazad je deo našeg odrastanja.</p>
                    <a href="{{ route('show-single-product', ['slug' => 'psenicni-griz-200g']) }}">Saznaj više</a>
                </div>
            </div>
        </div>
    </section>
@endsection
