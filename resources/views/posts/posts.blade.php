@extends('layouts.app')

@section('content')

    <section>
        <img class="desktop" src="{{ asset('images/price-hero.png') }}" alt="" style="width: 100%; margin-top: 70px;">
        <img class="mobile" src="{{ asset('images/pricem.png') }}" alt="" style="width: 100%; margin-top: 70px;">
    </section>

    <section id="posts-list">
        <div class="posts-list-inner container-space">
            <h1>Blog</h1>
            <p>Male tajne u kuhinji uvek mogu biti od pomoći, bilo da ste početnik ili iskusna domaćica. Naše bake i mame su sve te tajne pažljivo čuvale, a mi ih delimo sa vama. Pronađite tradicionalne savete i trikove koji će vam pomoći da vreme u kuhinji provodite efikasnije. Pročitajte više priča o našoj slatkoj tradiciji, našim običajima i zanimljivosti o našim proizvodima.</p>
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
        <img class="mobile" src="{{ asset('images/homepage-banner2-mobile.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvujte u konkursu<br>"Uskršnje torte i <br>kolači"</h3>
                    <a href="{{ route('show-competition') }}">Pošaljite recept</a>
                </div>
            </div>
        </div>
    </section>

@endsection
