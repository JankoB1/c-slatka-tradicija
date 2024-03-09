@extends('layouts.app')

@section('content')

    <section id="top-profile">
        <div class="container-space">
            <h1>Učestvuj u konkursu<br>Torte i kolači sa<br>Eskimko sladoledom</h1>
            <a href="{{ route('show-competition') }}">Nagradni konkurs</a>
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
            <div class="edit-profile-container">
                <h3>O meni</h3>
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                        <p>Napiši nešto o sebi</p>
                    </div>
                    <div class="col-md-7">
                        <textarea name="about" cols="30" rows="10">{{ Auth::user()->about }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                        <p>Koji je tvoj datum rođenja</p>
                    </div>
                    <div class="col-md-7">
                        <input type="date" name="birthdate" id="birthdate" value="{{ Auth::user()->birthdate }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                        <p>U kom gradu živiš?</p>
                    </div>
                    <div class="col-md-7">
                        <input type="text" name="city" id="city" value="{{ Auth::user()->city }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                        <p>Link do tvog Facebook profila</p>
                    </div>
                    <div class="col-md-7">
                        <input type="url" name="fb" id="fb" value="{{ Auth::user()->fb }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                        <p>Link do tvog Instagram profila</p>
                    </div>
                    <div class="col-md-7">
                        <input type="url" name="ig" id="ig" value="{{ Auth::user()->ig }}">
                    </div>
                    <button type="button" class="profile-save save-1">Sačuvaj izmene</button>
                </div>
            </div>
                <div class="edit-profile-container">
                    <h3>Podaci za slanje poklona</h3>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                            <p>Ime i prezime primaoca</p>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="surname" value="{{ Auth::user()->surname }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                            <p>Kontakt telefon primaoca</p>
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="phone" value="{{ Auth::user()->phone }}" id="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                            <p>Email adresa primaoca</p>
                        </div>
                        <div class="col-md-7">
                            <input type="email" name="email" value="{{ Auth::user()->email }}" id="email">
                        </div>
                        <button type="button" class="profile-save save-2">Sačuvaj izmene</button>
                    </div>
                </div>
            </div>
    </section>

@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/edit-profile.js') }}" type="text/javascript"></script>
@endsection
