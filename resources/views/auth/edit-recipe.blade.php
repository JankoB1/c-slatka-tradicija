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

    <section id="recipe-form" class="recipe-form-competition recipe-edit-section" data-edit="{{ $recipe->id }}">
        <input type="hidden" name="cat_id" id="cat_id" value="{{ $recipe->category_id }}">
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
                                        <input type="text" name="title" placeholder="Naziv recepta" value="{{ $recipe->title }}">
                                    </div>
                                    <div class="col-md-6">
                                        <select name="category">
                                            <option value="">Kategorija recepta (izaberi)</option>
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
                                            <option value="">Težina pripreme (izaberi)</option>
                                            <option {{ $recipe->difficulty == 'Lako'? 'selected': '' }} value="Lako">Lako</option>
                                            <option {{ $recipe->difficulty == 'Srednje'? 'selected': '' }} value="Srednje">Srednje</option>
                                            <option {{ $recipe->difficulty == 'Teško'? 'selected': '' }} value="Teško">Teško</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="preparation_time">
                                            <option value="">Vreme pripreme (izaberi)</option>
                                            <option {{ $recipe->preparation_time == 'do 30 min'? 'selected': '' }} value="do 30 min">do 30 min</option>
                                            <option {{ $recipe->preparation_time == '30-60 min'? 'selected': '' }} value="30-60 min">30-60 min</option>
                                            <option {{ $recipe->preparation_time == '60+ min'? 'selected': '' }} value="60+ min">60+ min</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="portion_number" placeholder="Broj porcija" value="{{ $recipe->portion_number }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="description" id="" cols="30" rows="10" placeholder="Opiši svoj recept">{{ $recipe->description }}</textarea>
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
                                    @foreach($ingredientGroups as $key => $group)
                                        <div class="single-ingredient-group row">
                                            <div class="col-md-11 col-10">
                                                <input type="text" name="ingredient_group_name" placeholder="Naziv grupe sastojaka" value="{{ $key }}">
                                            </div>
                                            <div class="col-md-1 col-2">
                                                <span class="ingredient-plus">
                                                    <img src="https://www.c-slatkatradicija.rs/images/ingridient-plus.svg" alt="dodaj sastojak">
                                                </span>
                                            </div>
                                            @foreach($group as $ingredient)
                                                <div>
                                                    <div class="row ingredients-cont">
                                                        <input type="hidden" name="ingredient_product" value="{{ $ingredient['product_id'] }}">
                                                        <div class="col-md-5 col-10">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="text" name="ingredient_quantity" placeholder="Količina" value="{{ $ingredient['quantity'] }}">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select name="ingredient_measure">
                                                                        <option value="">Jedinica mere</option>
                                                                        <option {{ $ingredient['measure'] == 'g'? 'selected': '' }} value="g">g</option>
                                                                        <option {{ $ingredient['measure'] == 'kg'? 'selected': '' }} value="kg">kg</option>
                                                                        <option {{ $ingredient['measure'] == 'ml'? 'selected': '' }} value="ml">ml</option>
                                                                        <option {{ $ingredient['measure'] == 'malo'? 'selected': '' }} value="malo">malo</option>
                                                                        <option {{ $ingredient['measure'] == 'prstohvat'? 'selected': '' }} value="prstohvat">prstohvat</option>
                                                                        <option {{ $ingredient['measure'] == 'kašika'? 'selected': '' }} value="kašika">kašika</option>
                                                                        <option {{ $ingredient['measure'] == 'kesica'? 'selected': '' }} value="kesica">kesica</option>
                                                                        <option {{ $ingredient['measure'] == 'čaša'? 'selected': '' }} value="čaša">čaša</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-10">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <textarea type="text" name="ingredient_name" placeholder="Naziv sastojka">{{ $ingredient['name'] }}</textarea>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <i class="fa-solid fa-minus"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>

                                <div class="single-ingredients-inner">
                                    @foreach($recipe->ingredients as $ingredient)
                                        @if($ingredient->group == null)
                                            <div>
                                                <div class="row ingredients-cont">
                                                    <input type="hidden" name="ingredient_product" value="{{ $ingredient->product_id }}">
                                                    <div class="col-md-5 col-10">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" name="ingredient_quantity" placeholder="Količina" value="{{ $ingredient->quantity }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select name="ingredient_measure">
                                                                    <option value="">Jedinica mere</option>
                                                                    <option {{ $ingredient->measure == 'g'? 'selected': '' }} value="g">g</option>
                                                                    <option {{ $ingredient->measure == 'kg'? 'selected': '' }} value="kg">kg</option>
                                                                    <option {{ $ingredient->measure == 'ml'? 'selected': '' }} value="ml">ml</option>
                                                                    <option {{ $ingredient->measure == 'malo'? 'selected': '' }} value="malo">malo</option>
                                                                    <option {{ $ingredient->measure == 'prstohvat'? 'selected': '' }} value="prstohvat">prstohvat</option>
                                                                    <option {{ $ingredient->measure == 'kašika'? 'selected': '' }} value="kašika">kašika</option>
                                                                    <option {{ $ingredient->measure == 'kesica'? 'selected': '' }} value="kesica">kesica</option>
                                                                    <option {{ $ingredient->measure == 'čaša'? 'selected': '' }} value="čaša">čaša</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 col-10">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <textarea type="text" name="ingredient_name" placeholder="Naziv sastojka">{{ $ingredient->title }}</textarea>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
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
                                    @foreach($stepGroups as $key => $group)
                                        <div class="single-step-group">
                                            <input type="text" name="step_group_name" placeholder="Naziv koraka pripreme" value="{{ $key }}">
                                            <textarea type="text" name="single_step" placeholder="Opiši korak pripreme">{{ $group[0]['name'] }}</textarea>
                                            <i class="fa-solid fa-minus"></i>
                                        </div>
                                    @endforeach
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
                                    @foreach($recipe->images as $image)
                                        <div class="single-image-div">
                                            <div class="single-img" data-image-id="{{ $image->id }}" style="background-image: url('{{ asset('storage/upload/' . $image->path) }}');"></div>
                                            <div><div class="row image-controls-row">
                                                    <div class="col-3">
                                                        <img class="delete-img" src="{{ asset('images/delete-img.png') }}" alt="delete img">
                                                    </div>
                                                    <div class="col-6" style="display: flex; justify-content: center; column-gap: 10px; visibility: hidden;">
                                                        <img class="plus-img" src="http://127.0.0.1:8000/images/zoom-plus-img.png" alt="zoom img">
                                                        <img class="minus-img" src="http://127.0.0.1:8000/images/zoom-minus-img.png" alt="zoom img">
                                                        <img class="left-img" src="http://127.0.0.1:8000/images/left-img.png" alt="left img">
                                                        <img class="right-img" src="http://127.0.0.1:8000/images/right-img.png" alt="right img">
                                                        <img class="top-img" src="http://127.0.0.1:8000/images/left-img.png" alt="top img">
                                                        <img class="bottom-img" src="http://127.0.0.1:8000/images/left-img.png" alt="bottom img">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button class="finish-btn" type="button">Završeno</button>
                                                    </div>
                                                </div></div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="add-image-container add-image">
                                    <img src="{{ asset('images/add-image-icon.png') }}" alt="add image">
                                    <h3>Dodaj fotografiju</h3>
                                    <p>Formati: PNG, JPG, JPEG, WEBP</p>
                                </div>
                                <button class="submit-recipe" type="button">Izmeni recept</button>
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
                    <h3>Učestvuj u konkursu<br>"Uskršnje torte i <br>kolači"</h3>
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

@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/create-recipe.js') }}"></script>
@endsection
