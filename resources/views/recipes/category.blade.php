@extends('layouts.app')

@section('content')
    <section id="recipes-category-banner"></section>

    <section id="recipes-category-content">
        <div class="recipes-category-content container-space">
            <a href="#" class="all-categories-link"><img src="{{ asset('images/left-arrow.svg') }}" alt="left arrow">Sve kategorije recepata</a>
            <h1>{{ $category->name }}</h1>
            <div class="row">
                @foreach($recipes as $recipe)
                    <div class="col-md-4">
                        <a class="single-recipe-link" href="{{ route('show-single-recipe', ['slug' => $recipe->slug, 'category' => $category->slug]) }}">
                            <div class="single-recipe-preview">
                                <div class="recipe-preview-img">

                                </div>
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
@endsection
