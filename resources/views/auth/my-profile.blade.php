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
                            <img src="{{ asset('images/settings-icon.svg') }}" alt="settings">
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
                            {{ Auth::user()->birthdate }}
                        </div>
                        <div class="single-detail">
                            <img src="{{ asset('images/city.svg') }}" alt="city">
                            {{ Auth::user()->city }}
                        </div>
                        <div class="single-detail">
                            <a href="{{ Auth::user()->fb }}">
                                <img src="{{ asset('images/fb-profile.svg') }}" alt="fb">
                                Facebook profil
                            </a>
                        </div>
                        <div class="single-detail">
                            <a href="{{ Auth::user()->ig }}">
                                <img src="{{ asset('images/ig-profile.svg') }}" alt="ig">
                                Instagram profil
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="profile-recipes">
                        <div class="top-nav">
                            <div class="single-btn">
                                <p>Objavljeni recepti</p>
                            </div>
                            <div class="single-btn">
                                <p>Sačuvani recepti</p>
                            </div>
                        </div>
                        <div class="profile-recipes-content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
