@extends('layouts.app')

@section('title', 'Svi recepti')

@section('content')

    <section id="recipe-gallery"></section>

    <section id="recipe-actions">
        <div class="recipe-actions-inner container-space">
            <p class="like">Like</p>
            <div>
                <img src="#" alt="">
                <p>Podeli</p>
            </div>
            <div>
                <img src="#" alt="">
                <p>Sačuvaj u knjižicu recepata</p>
            </div>
            <div>
                <img src="#" alt="">
                <p class="save">Sačuvaj na profilu</p>
            </div>
            <div>
                <img src="#" alt="">
                <p>Ištampajte</p>
            </div>
        </div>
    </section>

    <section id="recipe-main">
        <div class="recipe-main-inner container-space">
            <div class="row">
                <div class="col-md-3">
                    <h3>Osnovne informacije</h3>
                    <div class="single-info">
                        <p><strong>Vreme pripreme:</strong> {{ $recipe->preparation_time }}</p>
                    </div>
                    <div class="single-info">
                        <p><strong>Težina pripreme:</strong> {{ $recipe->difficulty }}</p>
                    </div>
                    <div class="single-info">
                        <p><strong>Broj porcija:</strong> {{ $recipe->portion_number }}</p>
                    </div>
                    <h3>Sastojci</h3>
                    <div class="single-info">
                        @foreach($ingredientGroups as $key => $items)
                            <h5>{{ $key }}</h5>
                            @foreach($items as $item)
                                <p>{{ $item['title'] }}</p>
                            @endforeach
                        @endforeach
                        @foreach($recipe->ingredients as $ingredient)
                            @if($ingredient->group == null)
                                <p>{{ $ingredient->title }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9"></div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/single-recipe.js') }}" type="text/javascript"></script>
@endsection
