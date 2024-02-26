@extends('layouts.app')

@section('content')

    <section id="top-profile">
        <div class="container-space">
            <h1>Učestvuj u konkursu<br>Torte i kolači sa<br>Eskimko sladoledom</h1>
            <a href="#">Nagradni konkurs</a>
        </div>
    </section>

    <section id="my-profile-main">
        <div class="my-profile-main-inner container-space">
            <div class="row">
                <div class="col-md-2">
                    @if(Auth::user()->image_id != null)
                        <img src="{{ asset('images/' . Auth::user()->image_id) }}" alt="avatar" class="profile-img">
                    @else
                        <img src="{{ asset('images/avatar.png') }}" alt="avatar" class="profile-img">
                    @endif
                </div>
                <div class="col-md-10">
                    <div class="profile-top-details">
                        <div class="left">
                            <h2>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h2>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                        <div class="right">
                            <a href="{{ route('show-edit-profile') }}">
                                <img src="{{ asset('images/settings-icon.svg') }}" alt="settings">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-details">
                        <h4>O meni</h4>
                        <div class="single-detail">
                            <img src="{{ asset('images/birthdate.svg') }}" alt="birthdate">
                            <span>{{ Auth::user()->birthdate }}</span>
                        </div>
                        <div class="single-detail">
                            <img src="{{ asset('images/city.svg') }}" alt="city">
                            <span>{{ Auth::user()->city }}</span>
                        </div>
                        <div class="single-detail">
                            <a href="{{ Auth::user()->fb }}">
                                <img src="{{ asset('images/fb-profile.svg') }}" alt="fb">
                                <span>Facebook profil</span>
                            </a>
                        </div>
                        <div class="single-detail">
                            <a href="{{ Auth::user()->ig }}">
                                <img src="{{ asset('images/ig-profile.svg') }}" alt="ig">
                                <span>Instagram profil</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="profile-recipes">
                        <div class="top-nav">
                            <div class="single-btn">
                                <p class="active">Objavljeni recepti</p>
                            </div>
                            <div class="single-btn">
                                <p>Sačuvani recepti</p>
                            </div>
                        </div>
                        <div class="profile-recipes-content row active">
                            @foreach(Auth::user()->recipes as $recipe)
                                <div class="col-md-4">
                                    <div class="single-recipe-preview">
                                        <div class="recipe-preview-img">

                                        </div>
                                        <p>{{ $recipe->title }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="profile-recipes-content profile-recipes-content-saved">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script type="text/javascript" src="{{ asset('js/my-profile.js') }}"></script>
@endsection
