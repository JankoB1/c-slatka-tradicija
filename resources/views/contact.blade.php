@extends('layouts.app')

@section('content')
    <section id="create-recipe-hero" class="contact-hero">

    </section>

    <section id="contact-content">
        <div class="contact-content-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h1>Kontakt</h1>
                    <h4>Dr. Oetker d.o.o.</h4>
                    <div class="contact-blurb">
                        <img src="{{ asset('images/contact-1.svg') }}" alt="contact">
                        <p>Vuka Karadžića 13<br>
                            22310 Šimanovci, Republika Srbija</p>
                    </div>
                    <div class="contact-blurb">
                        <img src="{{ asset('images/contact-2.svg') }}" alt="contact">
                        <p><a href="tel:%20+38122800300">+381 (0)22 800 300</a></p>
                    </div>
                    <div class="contact-blurb">
                        <img src="{{ asset('images/contact-3.svg') }}" alt="contact">
                        <p><a href="mailto:info@c-slatkatradicija.rs">info@c-slatkatradicija.rs</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="#" id="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Ime">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="surname" placeholder="Prezime">
                            </div>
                            <div class="col-md-12">
                                <input type="email" name="email" placeholder="E-mail adresa">
                                <textarea name="message" id="" cols="30" rows="10" placeholder="Vaša poruka"></textarea>
                                <button>Pošalji poruku</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
