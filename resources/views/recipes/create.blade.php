@extends('layouts.app')

@section('title', 'Create a New Recipe')

@section('content')
    <section id="create-recipe-hero">

    </section>

    <section id="recipe-form">
        <div class="recipe-form-inner">
            <div class="row">
                <div class="col-md-7">
                    <h1>Podeli tvoje omiljene recepte i budi deo naše slatke tradicije!</h1>
                    <h2>Kako da objaviš recept?</h2>
                    <p>Jednostavno je! Unesi informacije u formu u nastavku, dodaj fotografije i pošalji recept.</p>
                    <p>Uživaj u procesu i ne zaboravi - svaki recept mora sadržati barem jedan proizvod iz našeg asortimana.</p>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('images/create-recipe-bowl.png') }}" alt="bowl" class="bowl">
                </div>
            </div>
        </div>
        <div class="form-inner">
            <form action="{{ route('recipes.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-section">

                    <div class="create-recipe-step active" data-step="1">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                                <p>Potrudi se da svoj recept opišeš što detaljnije. To će pomoći drugima da postanu bolji majstori i spreme tvoju poslasticu na što bolji način.</p>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="title" placeholder="Naziv recepta">
                                    </div>
                                    <div class="col-md-6">
                                        <select name="category">
                                            <option selected value="">Kategorija recepta (izaberi)</option>
                                            <option value="1"> Torte</option>
                                            <option value="2"> Kolaci </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="subcategory">
                                            <option selected value="">Podkategorija recepta (izaberi)</option>
                                            <option value="4">Torte sa slagom </option>
                                            <option value="5">Torte bez slaga </option>
                                            <option value="6">Kolaci sa vocem</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="difficulty">
                                            <option selected value="">Težina pripreme (izaberi)</option>
                                            <option value="Lako">Lako</option>
                                            <option value="Srednje">Srednje</option>
                                            <option value="Teško">Teško</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="preparation_time">
                                            <option selected value="">Vreme pripreme (izaberi)</option>
                                            <option value="10">10 min</option>
                                            <option value="20">20 min</option>
                                            <option value="30">30 min</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="portion_number" placeholder="Broj porcija">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="description" id="" cols="30" rows="10" placeholder="Opiši svoj recept"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="create-recipe-step" data-step="2">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nec velit a orci malesuada fermentum id a massa. Cras interdum porttitor sapien ac congue. </p>
                            </div>
                            <div class="col-md-7">
                                <div class="row ingredients-cont">
                                    <div class="col-md-6">
                                        <input type="text" name="ingredient_name" placeholder="Naziv sastojka">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="ingredient_quantity" placeholder="Količina (izaberi)">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="ingredient_measure" placeholder="Jedinica mere (izaberi)">
                                            </div>
                                            <div class="col-md-2">
                                                <span class="ingridient-plus"><img src="{{ asset('images/ingridient-plus.svg') }}" alt="dodaj sastojak"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="create-recipe-step" data-step="3">
                        <div class="row recipe-steps">
                            <div class="col-md-5">
                                <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                                <p>Predlažemo da ovaj deo raspišeš u koracima kako bi ostalima bilo lakše da prate sam proces spremanja.</p>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="single_step" placeholder="Prvi korak">
                            </div>
                        </div>
                    </div>

                    <div class="create-recipe-step" data-step="4">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                                <p>Fotografije su obavezan element recepta, a možeš da ih dodaš maksimalno 10.</p>
                                <p>Obavezno je okačiti fotografiju finalnog proizvoda, a ostatak je tvoj izbor. Možeš prikazati neki deo procesa, fotografije C proizvoda ili nekog alata.</p>
                                <label for="images">Upload Images (up to 10)</label>
                                <input type="file" name="images[]" multiple accept="images/*">
                            </div>
                            <div class="col-md-7">
                                <button class="submit-recipe" type="button">Pošalji recept</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7 offset-md-5">
                            <button type="button" class="add-step">Dodaj naredni korak u pripremi</button>
                            <button type="button" class="continue">Dalje</button>
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
                    <p>AKTIVNI NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Torte i kolači sa<br>pudingom"</h3>
                    <a href="#">Nagradni konkursi</a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/create-recipe.js') }}"></script>
@endsection
