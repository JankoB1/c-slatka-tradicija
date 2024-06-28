@extends('layouts.app')

@section('meta')
    <meta property="og:image" content="{{ $post->image }}" />
@endsection

@section('scriptsTop')
    <section id="post-content">
        <div class="post-content-inner container-space">
            <h1>{{ $post->title }}</h1>
            {!! $post->content !!}
            <div class="share">
                <img src="{{ asset('images/share.svg') }}" alt="share">
                <p>Podeli</p>
            </div>
        </div>
    </section>

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/homepage-banner2-mobile.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Torte i kolači sa <br>Eskimko sladoledom"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptsBottom')
    <script>
        let share = document.querySelector('.share');
        share.addEventListener('click', function() {
            let shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(window.location.href)}&src=sdkpreparse`;
            window.open(shareUrl, '_blank');
        });
    </script>
@endsection
