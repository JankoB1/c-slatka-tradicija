@extends('layouts.app')

@section('title', 'Create a New Recipe')

@section('content')
    <section id="create-recipe-hero">
        <div class="create-recipe-hero-inner">
            <h1>Podeli tvoje omiljene<br>recepte i budi deo naše<br>slatke tradicije!</h1>
            <img src="{{ asset('images/down.svg') }}" alt="down" class="down">
        </div>
    </section>

    <section id="recipe-form">
        <div class="recipe-form-inner">
            <div class="row">
                <div class="col-md-6">
                    <h2>Kako da objaviš recept?</h2>
                    <p>Jednostavno je! Unesi osnove informacije o sebi, unesi informacije u formu o receptu i dodaj fotografije.</p>
                    <p>Recept će biti objavljen nakon što prođe kratku proveru naših kolega. Takođe, ne zaboravi da recept mora sadržati barem jedan proizvod iz našeg asortimana.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/create-recipe-bowl.png') }}" alt="bowl" class="bowl">
                </div>
            </div>
        </div>
        <div class="form-inner">
            <form action="{{ route('recipes.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-section">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                            <p>Potrebne su nam osnove informacije o tebi, e-mail i tvoje ime ili nadimak.</p>
                            <p>Ukoliko te interesuje zašto su nam ove informacije značajne, to možeš pogledati ovde.</p>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="email" name="userEmail" placeholder="E-mail adresa">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="userName" placeholder="Ime ili nadimak">
                                    <div class="checkbox-username">
                                        <input type="checkbox" name="publicName">
                                        <label for="publicName">Ne želim da moje ime bude<br>objavljeno uz naziv recepta</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                            <p>Potrudi se da svoj recept opišeš što detaljnije. To će pomoći drugima da postanu bolji majstori i spreme tvoju poslasticu na što bolji način.</p>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-6">
                                        <select name="category">
                                            <option selected value="">Kategorija recepta (izaberi)</option>
                                            @forelse($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @empty
                                                <option> 1 </option>
                                            @endforelse
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="title" placeholder="Naziv recepta">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="difficulty">
                                        <option selected value="">Težina pripreme (izaberi)</option>
                                        <option value="Lako">Lako</option>
                                        <option value="Srednje">Srednje</option>
                                        <option value="Teško">Teško</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="preparation_time">
                                        <option selected value="">Vreme pripreme (izaberi)</option>
                                        <option value="10">10 min</option>
                                        <option value="20">20 min</option>
                                        <option value="30">30 min</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="description" id="" cols="30" rows="10" placeholder="Opiši svoj recept (opciono)"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="ingredients" id="" cols="30" rows="10" placeholder="Sastojci"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                            <p>Predlažemo da ovaj deo raspišeš u koracima kako bi ostalima bilo lakše da prate sam proces spremanja.</p>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="preparation_description" id="" cols="30" rows="10" placeholder="Kako se priprema?"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea name="additionalDescription" id="" cols="30" rows="10" placeholder="Dodatan savet"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                            <p>Fotografije su obavezan element recepta, a možeš da ih dodaš maksimalno 10.</p>
                            <p>Obavezno je okačiti fotografiju finalnog proizvoda, a ostatak je tvoj izbor. Možeš prikazati neki deo procesa, fotografije C proizvoda ili nekog alata.</p>
                            <label for="images">Upload Images (up to 10)</label>
                            <input type="file" name="images[]" multiple accept="images/*">

                        </div>
                        <div class="col-md-7">
                            <button class="submit-recipe" type="submit">Pošalji recept</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <section id="homepage-banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>AKTIVNI KONKURSI</p>
                    <h3>Učestvuj u konkursu<br>Torte i kolači sa<br>Eskimko sladoledom</h3>
                    <a href="#">Saznaj više</a>
                </div>
            </div>
        </div>
    </section>

    <section id="newsletter">
        <img src="{{ asset('images/logo-c.png') }}" alt="logo c">
        <div class="nl-inner"></div>
    </section>
@endsection
