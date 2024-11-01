@extends('layouts.app')

@section('content')
    <section id="homepage-banner2" class="login-hero">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p class="desktop">NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Recepti za pripremu oblandi"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
                </div>
            </div>
        </div>
    </section>

    <section id="login-content">
        <div class="login-content-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h1>Registruj se</h1>
                    <h2>Imaš nalog? <a href="{{ route('login') }}">Prijavi se.</a></h2>
                    <h3 style="margin-bottom: 0 !important;">Registruj se i postani deo C Slatka tradicija zajednice!</h3>
                    <p>Svi registrovani korisnici imaju mogućnost da dele svoje recepte sa drugima, da sačuvaju recepte sa sajta koji im se dopadaju i da učestvuju u C Slatka tradicija nagradnim konkursima koje organizujemo svakog meseca.</p>
                </div>
                <div class="col-md-6">
                    <div class="login-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail adresa">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus placeholder="Korisničko ime">

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Lozinka">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Potvrdi lozinku">

                            <button type="submit" class="btn btn-primary">
                                {{ __('Registruj se') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script>
        document.querySelector('#login-content').scrollIntoView({ behavior: 'smooth' });
        document.querySelector('form input#email').focus();
    </script>
@endsection
