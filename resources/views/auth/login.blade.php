@extends('layouts.app')

@section('content')
    <section id="homepage-banner2" class="login-hero">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p class="desktop">AKTIVNI NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Torte i kolači sa<br>pudingom"</h3>
                    <a href="{{ route('show-competition') }}">Nagradni konkursi</a>
                </div>
            </div>
        </div>
    </section>

    <section id="login-content">
        <div class="login-content-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h1>Prijavi se</h1>
                    <h2>Nemaš nalog? <a href="{{ route('register') }}">Registruj se.</a></h2>
                    <h3>Ukoliko imaš nalog, prijavi se i uplovi u svet C Slatka tradicija zajednice. Ukoliko ne, registruj se i pridruži nam se! </h3>
                    <p>Svi registrovani korisnici imaju mogućnost da dele svoje recepte sa drugima, da sačuvaju recepte sa sajta koji im se dopadaju i da učestvuju u C Slatka tradicija nagradnim konkursima koje organizujemo svakog meseca.</p>
                </div>
                <div class="col-md-6">
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail adresa">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Lozinka">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Zapamti') }}
                                </label>
                            </div>

                            <button type="submit">
                                {{ __('Prijavi se') }}
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
