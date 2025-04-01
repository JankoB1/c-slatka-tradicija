@extends('layouts.app')

@section('content')

    <section>
        <img class="desktop" src="{{ asset('images/price-hero.png') }}" alt="" style="width: 100%; margin-top: 70px;">
        <img class="mobile" src="{{ asset('images/pricem.png') }}" alt="" style="width: 100%; margin-top: 70px;">
    </section>

    <section id="posts-list">
        <div class="posts-list-inner container-space">
            <h1>Blog</h1>
            <p>Male tajne u kuhinji uvek mogu biti od pomoći, bilo da si početnik ili iskusna domaćica. Naše bake i mame su sve te tajne pažljivo čuvale, a mi ih delimo sa tobom. Pronađi tradicionalne savete i trikove koji će ti pomoći da vreme u kuhinji provodite efikasnije. Pročitaj više priča o našoj slatkoj tradiciji, našim običajima i zanimljivosti o našim proizvodima.</p>
            <div class="row posts-row">
                @foreach($posts as $post)
                    <div class="col-md-4">
                        <a class="single-recipe-link" href="{{ route('show-single-post', ['id' => $post->id]) }}">
                            <div class="single-recipe-preview">
                                <div class="recipe-preview-img" style="background-image: url('{{ $post->image }}')">

                                </div>
                                <p>{{ $post->title }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="pagination">
                    {{ $posts->links() }}
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
                    <h3>Učestvuj u konkursu<br>"Uskršnje poslastice"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
                </div>
            </div>
        </div>
    </section>

@endsection
