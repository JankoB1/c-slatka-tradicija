@extends('layouts.app')

@section('content')
    <section id="single-product-main" class="{{ $product->name == 'Pšenični griz' ? 'griz-hero': '' }}" >
        <div class="single-product-main-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <h1>{{ $product->name }}</h1>
                    <p>{!! $product->description !!}</p>
                    @if($product->neto != null)
                        <p class="neto-menu-toggle">
                            Neto težina <img src="{{ asset('images/arrow-neto.png') }}" alt="">
                        </p>
                        <div class="neto-dropdown-inner">
                            @foreach($netoProducts as $netoProduct)
                                <a href="{{ route('show-single-product', ['slug' => $netoProduct->slug]) }}">{{ $netoProduct->link }}g</a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('images/' . $product->image_path) }}" alt="{{ $product->name }}">
                </div>
            </div>
        </div>
    </section>

    @if($product->productCategory->slug != 'zimnica' && $product->product_guide != '')
        <section id="single-product-guide">
            <div class="single-product-guide-inner container-space">
                <h2 class="preparation-heading">Uputstvo za pripremu</h2>
                <p>{!! $product->product_guide !!}</p>
                @if($product->energy != null || $product->fats != null || $product->saturated_fats != null || $product->carbonhydrates != null || $product->salts != null || $product->proteins != null)
                    <h3>Nutritivne vrednosti <img src="{{ asset('images/arrow-up-nt.svg') }}" alt="arrow-up"></h3>
                @endif
            </div>
            <div class="nutrition-table">
                <div class="single-nutrition">
                    <p>Energija</p>
                    <p>{{ $product->energy }}</p>
                </div>
                <div class="single-nutrition">
                    <p>Masti</p>
                    <p>{{ $product->fats }}</p>
                </div>
                <div class="single-nutrition">
                    <p>Od kojih zasićene masne kiseline</p>
                    <p></p>
                </div>
                <div class="single-nutrition">
                    <p>Ugljeni hidrati</p>
                    <p>{{ $product->saturated_fats }}</p>
                </div>
                <div class="single-nutrition">
                    <p>Od kojih šećeri</p>
                    <p>{{ $product->carbonhydrates }}</p>
                </div>
                <div class="single-nutrition">
                    <p>Proteini</p>
                    <p>{{ $product->proteins }}</p>
                </div>
                <div class="single-nutrition">
                    <p>So</p>
                    <p>{{ $product->salts }}</p>
                </div>
            </div>
        </section>
    @endif

    <section id="featured-recipes" class="{{ $product->productCategory->slug == 'zimnica' || $product->product_guide == ''? 'zimnica': '' }}">
        <div class="featured-recipes-inner container-space">
            <h2>Inspiriši se!</h2>
            <p>Pogledaj recepte koji sadrže ovaj proizvod i upusti se u kulinarsku avanturu.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            @if(isset($recipes[0]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[0]->category_slug, 'id' => $recipes[0]->id, 'slug' => $recipes[0]->recipe_slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[0]->image) }}');"></div>
                                        <p>{{ $recipes[0]->recipe_title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(isset($recipes[1]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[1]->category_slug, 'id' => $recipes[1]->id, 'slug' => $recipes[1]->recipe_slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[1]->image) }}');"></div>
                                        <p>{{ $recipes[1]->recipe_title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                    @if(isset($recipes[2]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[2]->category_slug, 'id' => $recipes[2]->id, 'slug' => $recipes[2]->recipe_slug]) }}">
                            <div class="featured-recipe-single">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[2]->image) }}');"></div>
                                <p>{{ $recipes[2]->recipe_title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    @if(isset($recipes[3]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[3]->category_slug, 'id' => $recipes[3]->id, 'slug' => $recipes[3]->recipe_slug]) }}">
                            <div class="featured-recipe-single big">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[3]->image) }}');"></div>
                                <p>{{ $recipes[3]->recipe_title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="single-category-products" class="{{ $product->productCategory->slug == 'griz'? 'puding': '' }} {{ $product->productCategory->slug == 'zimnica' || $product->product_guide == ''? 'white-bg': '' }}">
        <div class="single-category-products-inner container-space">
            <h2>Potrebno ti je još inspiracije</h2>
            <p>Bez brige! Naša C Slatka tradicija porodica nudi širok izbora proizvoda, a brza i jednostavna priprema olakšaće svako upuštanje u novu kulinarsku avanturu. </p>
            <div class="category-products">
                @foreach($products as $singleProduct)
                    @if($singleProduct->id != $product->id && $singleProduct->active == 'T')
                        <div class="single-product">
                            <a href="{{ route('show-single-product', ['slug' => $singleProduct->slug]) }}">
                                <img src="{{ asset('images/' . $singleProduct->image_path) }}" alt="">
                                <p>{{ $singleProduct->name }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/konkurs-mobile-520x360-3.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvuj u konkursu<br>"Slatka i kisela zimnica"</h3>
                    <a href="{{ route('show-competition') }}">Pošalji recept</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptsBottom')
    <script>
        document.querySelector('.single-product-guide-inner h3').addEventListener('click', function() {
            this.classList.toggle('active');
            document.querySelector('.nutrition-table').classList.toggle('active');
        });
    </script>

    <script>
        document.querySelector('.neto-menu-toggle').addEventListener('click', function() {
            document.querySelector('.neto-dropdown-inner').classList.toggle('active');
            this.classList.toggle('active');
        });
    </script>
@endsection
