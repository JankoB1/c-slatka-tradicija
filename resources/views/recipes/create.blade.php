@extends('layouts.app')

@section('title', 'Napravi novi recept')

@section('scriptsTop')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"></script>
@endsection

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
                    <div class="small-steps">
                        <div class="line-t"></div>
                        <div class="single-small-step current">
                            <div class="circle">
                                <img src="{{ asset('images/circle-checked.png') }}" alt="check">
                                <span>01</span>
                            </div>
                            <p>Recept</p>
                        </div>
                        <div class="single-small-step">
                            <div class="circle">
                                <img src="{{ asset('images/circle-checked.png') }}" alt="check">
                                <span>02</span>
                            </div>
                            <p>Sastojci</p>
                        </div>
                        <div class="single-small-step">
                            <div class="circle">
                                <img src="{{ asset('images/circle-checked.png') }}" alt="check">
                                <span>03</span>
                            </div>
                            <p>Kako se priprema</p>
                        </div>
                        <div class="single-small-step">
                            <div class="circle">
                                <img src="{{ asset('images/circle-checked.png') }}" alt="check">
                                <span>04</span>
                            </div>
                            <p>Dodaj fotografije</p>
                        </div>
                    </div>

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
                                            <option value="0">Torte</option>
                                            <option value="1">Kolači</option>
                                            <option value="2">Hleb i peciva</option>
                                            <option value="3">Zimnica</option>
                                            <option value="4">Deserti</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="subcategory">
                                            <option selected value="">Podkategorija recepta (izaberi)</option>
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
                            <div class="col-md-7 ingredients-section">
                                <div class="products-ingredients">

                                </div>

                                <div class="ingredients-inner">

                                </div>

                                <div class="single-ingredients-inner">

                                </div>

                                <div class="add-ingredients-btns">
                                    <button class="add-group-ingredient" type="button"><img src="{{ asset('images/add-group.svg') }}" alt="add group">Dodaj grupu sastojaka</button>
                                    <button class="add-ingredient" type="button"><img src="{{ asset('images/plus.svg') }}" alt="plus">Dodaj sastojak</button>
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
                                <div class="steps-inner">

                                </div>

                                <div class="single-steps-inner">

                                </div>

                                <div class="add-steps-btns">
                                    <button class="add-group-step" type="button"><img src="{{ asset('images/add-group.svg') }}" alt="add group">Dodaj korak</button>
{{--                                    <button class="add-single-step" type="button"><img src="{{ asset('images/plus.svg') }}" alt="plus">Dodaj korak</button>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="create-recipe-step" data-step="4">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                                <p>Fotografije su obavezan element recepta, a možeš da ih dodaš maksimalno 10.</p>
                                <p>Obavezno je okačiti fotografiju finalnog proizvoda, a ostatak je tvoj izbor. Možeš prikazati neki deo procesa, fotografije C proizvoda ili nekog alata.</p>
{{--                                <label for="images">Upload Images (up to 10)</label>--}}
{{--                                <p class="add-image">Dodaj sliku</p>--}}
{{--                                <input type="file" name="images[]" multiple accept="images/*">--}}
                            </div>
                            <div class="col-md-7">
                                <div class="images">

                                </div>
                                <div class="add-image-container add-image">
                                    <img src="{{ asset('images/add-image-icon.png') }}" alt="add image">
                                    <h3>Dodaj fotografiju</h3>
                                    <p>Formati: PNG, JPG, JPEG, WEBP</p>
                                </div>
                                <button class="submit-recipe" type="button">Pošalji recept</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7 offset-md-5">
                            @auth()
                                <button type="button" class="continue">Dalje</button>
                            @else
                                <button type="button" class="continue not-auth" data-bs-toggle="modal" data-bs-target="#login-popup">Dalje</button>
                            @endauth
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </section>

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/homepage-banner2-mobile.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>AKTIVNI NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Torte i kolači sa<br>pudingom"</h3>
                    <a href="{{ route('show-competition') }}">Nagradni konkursi</a>
                </div>
            </div>
        </div>
    </section>

    @guest()
        <div class="modal fade" id="login-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <p>Da biste pristupili ovoj stranici, potrebno je da budete prijavljeni na našem web sajtu.</p>
                                <p>Bez brige, ukoliko nemate profil, proces je kratak i vrlo brzo ćete moći da nastavite sa korišćenjem sajta.</p>
                                <a href="{{ route('login') }}">Prijavi se</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    @auth()
        <div class="modal fade" id="loading-popup" tabindex="-1" aria-labelledby="loadingPopupLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <p>Vaš recept se priprema!</p>
                                <img src="{{ asset('images/loading.png') }}" alt="loading" class="loading-spinner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth

@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/create-recipe.js') }}"></script>
@endsection
