@extends('layouts.app')

@section('title', 'Svi recepti')

@section('content')

    <section data-recipe-id="{{ $recipe->id }}" id="recipe-gallery">
        <div class="swiper single-recipe-gallery">
            <div class="swiper-wrapper">
                @foreach($recipe->images as $image)
                    <div class="single-recipe-gallery-img" style="background-image: url('{{ asset('storage/upload/' . $image->path) }}')">

                    </div>
                @endforeach
            </div>
        </div>
        <div class="like-cont like">
            <img src="{{ asset('images/like.svg') }}" alt="like">
            <p>Like</p>
        </div>
    </section>

    <section id="recipe-actions">
        <div class="recipe-actions-inner container-space">
            <div>
                <img src="{{ asset('images/share.svg') }}" alt="share">
                <p>Podeli</p>
            </div>
            <div class="add-to-book">
                <img src="{{ asset('images/book.svg') }}" alt="save">
                <p>Sačuvaj u knjižicu recepata</p>
            </div>
            <div class="save">
                <img src="{{ asset('images/save.svg') }}" alt="save">
                <p>Sačuvaj na profilu</p>
            </div>
            <div>
                <img src="{{ asset('images/print-f.svg') }}" alt="print">
                <p>Ištampajte</p>
            </div>
        </div>
    </section>

    <section id="recipe-main">
        <div class="recipe-main-inner container-space">
            <div class="row">
                <div class="col-md-3">
                    <h4>Osnovne informacije</h4>
                    <div class="single-info">
                        <p><strong>Vreme pripreme:</strong><br>{{ $recipe->preparation_time }}</p>
                    </div>
                    <div class="single-info">
                        <p><strong>Težina pripreme:</strong><br>{{ $recipe->difficulty }}</p>
                    </div>
                    <div class="single-info">
                        <p><strong>Broj porcija:</strong><br>{{ $recipe->portion_number }}</p>
                    </div>
                    <h4>Sastojci</h4>
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
                <div class="col-md-9">
                    <h1>{{ $recipe->title }}</h1>
                    <h4>Opis recepta</h4>
                    <p>{{ $recipe->description }}</p>
                    <h4>Kako se priprema?</h4>
                    @foreach($stepGroups as $key => $items)
                        <h5>{{ $key }}</h5>
                        @foreach($items as $item)
                            <p>{{ $item['title'] }}</p>
                        @endforeach
                    @endforeach
                    @foreach($recipe->steps as $step)
                        @if($step->group == null)
                            <p>{{ $step->title }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/single-recipe.js') }}" type="text/javascript"></script>
@endsection
