@extends('layouts.app')

@section('scriptsTop')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"></script>
@endsection

@section('content')

    <section>
        <img class="desktop" src="{{ asset('images/add-recipe-hero.jpeg') }}" alt="" style="width: 100%; margin-top: 70px;">
        <img class="mobile" src="{{ asset('images/add-recipe-herom.jpeg') }}" alt="" style="width: 100%; margin-top: 70px;">
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
                            <p>Koraci pripreme</p>
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
                                            <option value="do 30 min">do 30 min</option>
                                            <option value="30-60 min">30-60 min</option>
                                            <option value="60+ min">60+ min</option>
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
                                <p>Dodaj sastojke koji su potrebni za pripremu prethodno opisanog recepta. Možeš ih dodati nasumično ili pak u grupama kako bi olakšali pripremu svima koji odluče da pripremaju prema tvom receptu. </p>
                                <p>Primer: napraviti 3 grupe - kora, fil, dekoracija i u svakoj od grupa dodati sastojke koji su potrebni za tu grupu.</p>
                            </div>
                            <div class="col-md-7 ingredients-section">
                                <div class="products-ingredients">

                                </div>

                                <div class="ingredients-inner">

                                </div>

                                <div class="single-ingredients-inner">

                                </div>

                                <div class="add-ingredients-btns">
                                    <button style="width: 100% !important;" class="add-group-ingredient" type="button"><img src="{{ asset('images/add-group.svg') }}" alt="add group">Dodaj grupu sastojaka</button>
                                    <button style="display: none !important;" class="add-ingredient" type="button"><img src="{{ asset('images/plus.svg') }}" alt="plus">Dodaj sastojak</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="create-recipe-step" data-step="3">
                        <div class="row recipe-steps">
                            <div class="col-md-5">
                                <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                                <p>Svi znamo da je nekada upravo u redosledu tajna sjajno pripremljenog recepta. Predlažemo ti da recept opišeš u kratkim koracima kako bi svi koji odluče da pripremaju prema tvom receptu dobili krajnji proizvod kao i ti.</p>
                            </div>
                            <div class="col-md-7">
                                <div class="steps-inner">

                                </div>

                                <div class="single-steps-inner">

                                </div>

                                <div class="add-steps-btns">
                                    <button class="add-group-step" type="button"><img src="{{ asset('images/add-group.svg') }}" alt="add group">Dodaj korak pripreme</button>
{{--                                    <button class="add-single-step" type="button"><img src="{{ asset('images/plus.svg') }}" alt="plus">Dodaj korak</button>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="create-recipe-step" data-step="4">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset('images/lamp.svg') }}" alt="lamp">
                                <p>Fotografije nisu obavezan element recepta, ali bi bilo divno da dodaš minimalno jednu fotografiju i time pomogneš svima koji razmatraju tvoj recept da mogu da ga i vizualizuju. Možeš dodati maksimalno 10 fotografija.</p>
                                <p>Ukoliko dodaješ jednu fotografiju, predlažemo da to bude fotografija finalno serviranog proizvoda, a ostatak fotografija možeš dodati po želji. Na primer, možeš prikazati neki deo procesa pripreme, fotografije C proizvoda korišćenih u pripremi ili nekog specifičnog alata korišćenog u radu.</p>
                                <p>Kada dodaš fotografiju, uz pomoćne strelice možeš pozicionirati fotografiju baš kako ti odgovara. Ukoliko fotografišeš telefonom, predlažemo da zarotiraš telefon kako bismo došli do odgovarajućeg prikaza za C Slatka tradicija veb sajt.</p>
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
                        <div class="col-md-7 offset-md-5 one-btn buttons-cont">
                            @auth()
                                <button type="button" class="previous">Nazad</button>
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
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Letnje torte i <br>kolači"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
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
                                <p>Za pristup ovoj stranici, potrebna je prijava na našem web sajtu.</p>
                                <p>Bez brige, ukoliko nemaš profil, proces je kratak i vrlo brzo ćeš moći da nastaviš sa korišćenjem sajta.</p>
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
                                <p>Vaš recept se objavljuje.</p>
                                <img src="{{ asset('images/loading.png') }}" alt="loading" class="loading-spinner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    <div class="modal fade" id="image-crop-popup" tabindex="-1" aria-labelledby="loadingPopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="#" alt="crop image" style="width: 100%;">
                    <div id="obj" class="move resizable" onmousedown="makeObjectToDrag(this);" ontouchstart="makeObjectToDrag(this);">
                        <div class="resizers">
                            <div class="resizer top-left"></div>
                            <div class="resizer top-right"></div>
                            <div class="resizer bottom-left"></div>
                            <div class="resizer bottom-right"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="add-recipe" onclick="cropImage()">Završi</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/create-recipe.js') }}"></script>
@endsection
