@extends('layouts.app')

@section('content')
    <div style="padding-top: 100px;" id="login-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-md-7 text-center">
                            <p style="margin-bottom: 20px; text-align: center;">Novi link je poslat na tvoju e-mail adresu.</p>
                            <p style="text-align: center;"> Ukoliko i dalje imaš problema sa verifikacijom naloga, molimo te da nam pišeš na <a style="all: unset; text-decoration: underline;" href="#"> info@c-slatkatradicija.rs </a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
