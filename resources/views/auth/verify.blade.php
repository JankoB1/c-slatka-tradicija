@extends('layouts.app')

@section('content')

<div style="padding-top: 100px;" id="login-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7 form-section">
                        <p style="font-size: 22px; margin-bottom: 20px; text-align: center;">Tvoj nalog nije verifikovan</p>
                        <p style="margin-bottom: 20px; text-align: center;">Potrebno je da verifikuješ svoj nalog klikom na link iz mejla koji je stigao nakon registracije.</p>
                        <p style="margin-bottom: 30px; text-align: center;">Ukoliko ti e-mail nije stigao </p>

                            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div>
                                    <button class="resend-email-activation" type="submit">Klikni ovde za ponovno slanje.</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
