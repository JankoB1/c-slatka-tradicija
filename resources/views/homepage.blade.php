@extends('layouts.app')

@section('content')
    <section id="main-banner">
        <div class="main-banner-inner">
            <h1>Učestvuj u konkursu<br>"Poslastice sa kokosom"</h1>
            <a href="{{ route('show-competition') }}">Pošalji recept</a>
        </div>
    </section>

    <section id="featured-recipes">
        <div class="featured-recipes-inner container-space">
            <h2>Odabrani recepti</h2>
            <p>Pogledaj neke od najukusnijih recepata koje su pripremili ljubitelji slatke tradicije. Uživaj u pripremi i javi nam utiske.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            @if(isset($recipes[0]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[0]->category->slug, 'id' => $recipes[0]->id, 'slug' => $recipes[0]->slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[0]->image_old) }}');"></div>
                                        <p>{{ $recipes[0]->title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(isset($recipes[1]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[1]->category->slug, 'id' => $recipes[1]->id, 'slug' => $recipes[1]->slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[1]->image_old) }}');"></div>
                                        <p>{{ $recipes[1]->title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                    @if(isset($recipes[2]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[2]->category->slug, 'id' => $recipes[2]->id, 'slug' => $recipes[2]->slug]) }}">
                            <div class="featured-recipe-single">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[2]->image_old) }}');"></div>
                                <p>{{ $recipes[2]->title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    @if(isset($recipes[3]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[3]->category->slug, 'id' => $recipes[3]->id, 'slug' => $recipes[3]->slug]) }}">
                            <div class="featured-recipe-single big">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[3]->image_old) }}');"></div>
                                <p>{{ $recipes[3]->title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @if(isset($recipes2[0]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes2[0]->category->slug, 'id' => $recipes2[0]->id, 'slug' => $recipes2[0]->slug]) }}">
                            <div class="featured-recipe-single">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes2[0]->image_old) }}');"></div>
                                <p>{{ $recipes2[0]->title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    @if(isset($recipes2[1]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes2[1]->category->slug, 'id' => $recipes2[1]->id, 'slug' => $recipes2[1]->slug]) }}">
                            <div class="featured-recipe-single">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes2[1]->image_old) }}');"></div>
                                <p>{{ $recipes2[1]->title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="homepage-banner">
        <img class="mobile" src="{{ asset('images/homepage-banner-mobile.png') }}" alt="homepage banner mobile">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h3>Tvoj omiljeni obrok <br>još od detinjstva</h3>
                    <p>Za stare i mlade, za one koji vole ukuse detinjstva. Dečak sa pakovanja je dobro poznat svima i generacijama unazad je deo našeg odrastanja.</p>
                    <a href="{{ route('show-single-product', ['slug' => 'psenicni-griz-200g']) }}">Saznaj više</a>
                </div>
            </div>
        </div>
    </section>

    <section id="action">
        <div class="action-inner container-space">
            <h2>Inspiriši se!</h2>
            <p>Izaberi kategoriju, pogledaj recepte koje smo izdvojili za tebe i upusti se u kulinarsku avanturu.</p>
            <div class="categories-banners row">
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Torte</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladne-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-1"></div>
                                    <p class="subcategory-title">Čokoladne torte</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-2"></div>
                                    <p class="subcategory-title">Voćne torte</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremaste-torte']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-3"></div>
                                    <p class="subcategory-title">Kremaste torte</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Kolači</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sitni-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-4"></div>
                                    <p class="subcategory-title">Sitni kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocni-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-5"></div>
                                    <p class="subcategory-title">Voćni kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'cokoladni-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-6"></div>
                                    <p class="subcategory-title">Čokoladni kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kremasti-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-7"></div>
                                    <p class="subcategory-title">Kremasti kolači</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'recepti-za-oblande']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-8"></div>
                                    <p class="subcategory-title">Oblande</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'biskvitni-kolaci']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-9"></div>
                                    <p class="subcategory-title">Biskvitni kolači</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Hleb i <br>peciva</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <a href="{{ route('show-recipe-category', ['slug' => 'hleb-i-pogace']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-10"></div>
                                    <p class="subcategory-title">Hleb i pogače</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-peciva']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-11"></div>
                                    <p class="subcategory-title">Slatka peciva</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'slana-peciva']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-12"></div>
                                    <p class="subcategory-title">Slana peciva</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'predjela']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-13"></div>
                                    <p class="subcategory-title">Predjela</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Zimnica</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <a href="{{ route('show-recipe-category', ['slug' => 'slatka-zimnica']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-14"></div>
                                    <p class="subcategory-title">Slatka zimnica</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'kisela-zimnica']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-15"></div>
                                    <p class="subcategory-title">Kisela zimnica</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-category-banner">
                        <p>Deserti</p>
                    </div>
                    <div class="single-category-subcategories">
                        <div class="arrow-col">
                            <img src="{{ asset('images/up-arrow.svg') }}" alt="up-arrow">
                        </div>
                        <div class="single-subcategories">
                            <a href="{{ route('show-recipe-category', ['slug' => 'sladoled']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-16"></div>
                                    <p class="subcategory-title">Sladoled</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'vocne-salate-i-kupovi']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-17"></div>
                                    <p class="subcategory-title">Voćne salate i kupovi</p>
                                </div>
                            </a>
                            <a href="{{ route('show-recipe-category', ['slug' => 'deserti-u-casi']) }}">
                                <div class="single-subcategory">
                                    <div class="subcategory-img si-18"></div>
                                    <p class="subcategory-title">Deserti u čaši</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/konkurs-mobile-520x360-3.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Slatka i kisela <br>zimnica"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script type="text/javascript" src="{{ asset('js/homepage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/categories-filter.js') }}"></script>
@endsection
