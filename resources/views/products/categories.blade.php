@extends('layouts.app')

@section('content')

    <section class="single-category-section cookies">
        <div class="container">
            <img src="{{ asset('images/dodaci-za-kolace-hero-mobile.png') }}" alt="" class="mobile product-mobile">
            <div class="single-category-inner">
                <h2>Dodaci za kolače</h2>
                <p>Dodaci koji su generacijama unazad neizostavni saveznici u kuhinji. Za kolače ili peciva, za posebne trenutke ili svakodnevna uživanja, C Slatka tradicija dodaci za kolače su tajna ukusa kojima se cela porodica raduje. Nastavi slatku tradiciju sa našim dodacima za kolače i torte. Otkrij tajnu savršenog ukusa.</p>
                <a href="{{ route('show-single-category', ['slug' => 'dodaci-za-kolace']) }}">Pogledaj više</a>
            </div>
        </div>
    </section>

    <section class="single-category-section puding">
        <div class="container">
            <img src="{{ asset('images/puding-hero-mobile.png') }}" alt="" class="mobile product-mobile">
            <div class="single-category-inner">
                <h2>Puding</h2>
                <p>Da li ćeš ga spremiti kao samostalnu poslasticu ili dodati u kolače i torte? Svejedno je! Puding će ti vratiti osmeh na lice. Odaberi tvoj omiljeni ukus C Slatka tradicija pudinga. U njemu uživa cela porodica, a za njegovu pripremu nije potrebno mnogo vremena.</p>
                <a href="{{ route('show-single-category', ['slug' => 'puding']) }}">Pogledaj više</a>
            </div>
        </div>
    </section>

    <section class="single-category-section slag">
        <div class="container">
            <img src="{{ asset('images/slag-hero-mobile.png') }}" alt="" class="mobile product-mobile">
            <div class="single-category-inner">
                <h2>Šlag i Šlag krem</h2>
                <p>Decenijama unazad, tajni saveznik neodoljivih torti, sočnih kolača i laganih voćnih kupova, C Šlag i C Šlag krem svaku poslasticu čine još ukusnijom i potpuno neodoljivom. Mogu se koristiti kao dekoracija na tortama, ali i kao ukusni krem u omiljenim desertima.</p>
                <a href="{{ route('show-single-category', ['slug' => 'slag-kremovi']) }}">Pogledaj više</a>
            </div>
        </div>
    </section>

    <section class="single-category-section griz">
        <div class="container">
            <img src="{{ asset('images/griz-m.png') }}" alt="" class="mobile product-mobile">
            <div class="single-category-inner">
                <h2>Griz</h2>
                <p>Za stare i mlade, za one koji vole ukuse detinjstva. Griz možeš koristiti kao dodatak jelima, poslasticama ili pripremiti kao samostalan obrok. Dečak sa pakovanja je dobro poznat svima i generacijama unazad je deo našeg detinjstva.</p>
                <a href="{{ route('show-single-product', ['slug' => 'psenicni-griz-400g']) }}">Pogledaj više</a>
            </div>
        </div>
    </section>

    <section class="single-category-section oblande">
        <div class="container">
            <img src="{{ asset('images/oblande-m.png') }}" alt="" class="mobile product-mobile">
            <div class="single-category-inner">
                <h2>Oblande</h2>
                <p>Domaći kolač koji se već godinama priprema na čitav niz načina. Bez obzira da ih pripremaš za svakodnevnu konzumaciju, slavu ili drugi praznik uspeh i užitak su zagarantovani.</p>
                <a href="{{ route('show-single-product', ['slug' => 'oblande']) }}">Pogledaj više</a>
            </div>
        </div>
    </section>

    <section class="single-category-section eskimko">
        <div class="container">
            <img src="{{ asset('images/eskimko-hero-mobile.png') }}" alt="" class="mobile product-mobile">
            <div class="single-category-inner">
                <h2>Eskimko</h2>
                <p><strong>Leden, ukusan i osvežavajući.</strong> Lagana i brza priprema i neodoljivi ukusi, čine da svaki dan bude ledeno sladak. Možeš ga koristiti u pripremi omiljenih torti i kolača, ali i uz topinge ili voće po želji servirati najukusniji sladoled.</p>
                <a href="{{ route('show-single-category', ['slug' => 'eskimko']) }}">Pogledaj više</a>
            </div>
        </div>
    </section>

    <section class="single-category-section zimnica">
        <div class="container">
            <img src="{{ asset('images/zimnica-hero-mobile.png') }}" alt="" class="mobile product-mobile">
            <div class="single-category-inner">
                <h2>Zimnica</h2>
                <p>C Slatka tradicija proizvodi su tu da ti budu desna ruka dok pripremate turšije, kisele salate, sokove, marmelade i pekmeze. Vinobran, limuntus ili konzervans pomoći će ti da omiljene ukuse sačuvate za hladne, zimske dane.</p>
                <a href="{{ route('show-single-category', ['slug' => 'zimnica']) }}">Pogledaj više</a>
            </div>
        </div>
    </section>

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/konkurs-mobile-520x360-3.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Čokoladne torte i kolači"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
                </div>
            </div>
        </div>
    </section>


@endsection
