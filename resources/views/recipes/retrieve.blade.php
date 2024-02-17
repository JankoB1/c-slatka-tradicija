@extends('layouts.app')

@section('title', 'Svi recepti')

@section('content')

    <section id="recipe-gallery"></section>

    <section id="recipe-actions">
        <div class="recipe-actions-inner container-space">
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
                <p>Sačuvaj na profilu</p>
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
                </div>
                <div class="col-md-9"></div>
            </div>
        </div>
    </section>

@endsection
