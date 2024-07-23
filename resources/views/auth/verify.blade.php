@extends('layouts.app')

@section('content')

<div style="padding-top: 100px;" id="login-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7 form-section">
                        <p style="font-size: 22px; margin-bottom: 20px;">Verifikuj e-mail adresu</p>
                        <p style="margin-bottom: 20px;">Pre nego što nastaviš dalje, proveri svoje sanduče i verifikuj se.</p>
                        <p style="margin-bottom: 30px;">Ukoliko nisi dobio/la mejl, </p>

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
