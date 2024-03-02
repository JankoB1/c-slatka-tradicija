@extends('layouts.app')

@section('title', 'Svi recepti')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css" integrity="sha512-pmAAV1X4Nh5jA9m+jcvwJXFQvCBi3T17aZ1KWkqXr7g/O2YMvO8rfaa5ETWDuBvRq6fbDjlw4jHL44jNTScaKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('scriptsTop')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js" integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')

    <section data-recipe-id="{{ $recipe->id }}" id="recipe-gallery">
        @if($recipe->old_recipe == 0)
            <div class="swiper single-recipe-gallery">
                <div class="swiper-wrapper">
                    @foreach($recipe->images as $image)
                        <div class="swiper-slide">
                            <div class="single-recipe-gallery-img" style="background-image: url('{{ asset('storage/upload/' . $image->path) }}')">

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="old-recipe-img" style="background-image: url('{{ asset('storage/upload/' . $recipe->image_old) }}')">

            </div>
        @endif
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
                        @if($recipe->old_recipe == 0)
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
                        @else
                            @foreach($ingredients as $ingredient)
                                @if($ingredient->type == 1)
                                    <p>{{ $ingredient->title }}</p>
                                @else
                                    <h5>{{ $ingredient->title }}</h5>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    @if($recipe->old_recipe == 0 && $recipe->products != null)
                        <h4>Naši proizvodi</h4>
                        novi ima
                    @elseif($recipe->old_recipe == 1 && $products != null)
                        <h4>Naši proizvodi</h4>
                        stari ima
                    @endif
                </div>
                <div class="col-md-9">
                    <h1>{{ $recipe->title }}</h1>
                    <h4>Opis recepta</h4>
                    <p>{{ $recipe->description }}</p>
                    @if($recipe->old_recipe == 0)
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
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/single-recipe.js') }}" type="text/javascript"></script>
    <script>
        let gallerySlider = new Swiper('.single-recipe-gallery', {
            loop: true,
        })
    </script>
@endsection
