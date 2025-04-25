@extends('layouts.app')

@section('content')
    <section id="homepage-banner2" class="login-hero">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p class="desktop">NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Uskršnje poslastice"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
                </div>
            </div>
        </div>
    </section>

    <section id="login-content">
        <div class="login-content-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h1>Promeni lozinku</h1>
                    <h2>Nemaš nalog? <a href="{{ route('register') }}">Registruj se.</a></h2>
                    <h3>Ukoliko imaš nalog, prijavi se i uplovi u svet C Slatka tradicija zajednice. Ukoliko ne, registruj se i pridruži nam se! </h3>
                    <p>Svi registrovani korisnici imaju mogućnost da dele svoje recepte sa drugima, da sačuvaju recepte sa sajta koji im se dopadaju i da učestvuju u C Slatka tradicija nagradnim konkursima koje organizujemo svakog meseca.</p>
                </div>
                <div class="col-md-6">
                    <div class="login-form">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail adresa">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <button type="submit">
                                {{ __('Pošalji link za resetovanje lozinke') }}
                            </button>

                            {{--                            @if (Route::has('password.request'))--}}
                            {{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                            {{--                                    {{ __('Forgot Your Password?') }}--}}
                            {{--                                </a>--}}
                            {{--                            @endif--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
