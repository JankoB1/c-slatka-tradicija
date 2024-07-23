@extends('layouts.app')

@section('content')
    <div style="padding-top: 100px;" id="login-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-7 someclass">
                            <p style="margin-bottom: 20px;">Najnoviji link je poslat na tvoju adresu!</p>
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
