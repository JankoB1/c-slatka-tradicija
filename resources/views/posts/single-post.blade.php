@extends('layouts.app')

@section('scriptsTop')
    <section id="post-content">
        <div class="post-content-inner container-space">
            <h1>{{ $post->title }}</h1>
            {!! $post->content !!}
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
