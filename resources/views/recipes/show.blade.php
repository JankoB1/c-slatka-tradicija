@extends('layouts.app')

@section('meta')
    @if($recipe->old_recipe == 0)
        @if(count($recipe->images) > 0)
            <meta property="og:image" content="{{ asset('storage/upload/' . $recipe->images[0]->path) }}" />
        @else
            <meta property="og:image" content="{{ asset('images/recipe-no-image.png') }}" />
        @endif
    @else
        <meta property="og:image" content="{{ asset('storage/upload/' . $recipe->image_old) }}" />
    @endif
    <meta property="og:title" content="{{ $recipe->title }}" />
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css" integrity="sha512-pmAAV1X4Nh5jA9m+jcvwJXFQvCBi3T17aZ1KWkqXr7g/O2YMvO8rfaa5ETWDuBvRq6fbDjlw4jHL44jNTScaKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('scriptsTop')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js" integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')

    @guest()
        <div class="modal fade" id="login-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5"></div>
                            <div class="col-md-7">
                                <p>Da biste izvršili ovu akciju, potrebno je da budete prijavljeni na našem web sajtu.</p>
                                <p>Bez brige, ukoliko nemate profil, proces je kratak i vrlo brzo ćete moći da nastavite sa korišćenjem sajta.</p>
                                <a href="{{ route('login') }}">Prijavi se</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    <section data-recipe-id="{{ $recipe->id }}" id="recipe-gallery">
        @if($recipe->old_recipe == 0)
            <div class="swiper single-recipe-gallery">
                <div class="swiper-wrapper">
                    @if(count($recipe->images) > 0)
                        @foreach($recipe->images as $image)
                            <div class="swiper-slide">
                                <div class="single-recipe-gallery-img" style="background-image: url('{{ asset('storage/upload/' . $image->path) }}')">

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide">
                            <div class="single-recipe-gallery-img" style="background-image: url('{{ asset('images/recipe-no-image.png') }}')">

                            </div>
                        </div>
                    @endif
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        @else
            <div class="old-recipe-img" style="background-image: url('{{ asset('storage/upload/' . $recipe->image_old) }}')">

            </div>
        @endif
        <div class="like-cont like {{ $user_data['like'] != null? 'active': '' }}">
            <img src="{{ asset('images/like.svg') }}" alt="like">
            <p>{{ count($likes) }}</p>
        </div>
    </section>

    <section id="recipe-actions">
        <div class="recipe-actions-inner container-space">
            <div class="share">
                <img src="{{ asset('images/share.svg') }}" alt="share">
                <p>Podeli</p>
            </div>
            <div class="add-to-book">
                <img style="max-width: 30px" src="{{ asset('images/book.png') }}" alt="save">
                <p>Sačuvaj u knjižicu recepata</p>
            </div>
            <div class="save {{ $user_data['save'] != null? 'active': '' }}">
                <img src="{{ asset('images/save.svg') }}" alt="save">
                <p>Sačuvaj na profilu</p>
            </div>
            <div class="print">
                <img src="{{ asset('images/print-f.svg') }}" alt="print">
                <p>Štampaj</p>
            </div>
        </div>
    </section>

    <section id="recipe-main">
        <div class="recipe-main-inner container-space">
            <div class="row">
                <div class="col-md-3">
                    <h1 class="mobile">{{ $recipe->title }}</h1>
                    <h4 class="main-info">Osnovne informacije</h4>
                    <div class="single-info mb-low">
                        <p><strong>Vreme pripreme:</strong><br>{{ $recipe->preparation_time }}</p>
                    </div>
                    <div class="single-info mb-low">
                        <p><strong>Težina pripreme:</strong><br>{{ $recipe->difficulty }}</p>
                    </div>
                    @if($recipe->old_recipe == 0)
                        <div class="single-info">
                            <p><strong>Broj porcija:</strong><br>{{ $recipe->portion_number }}</p>
                        </div>
                    @endif
                    <h4 class="ing-header">Sastojci</h4>
                    <div class="single-info info-ings">
                        @if($recipe->old_recipe == 0)
                            @foreach($ingredientGroups as $key => $items)
                                <h5>{{ $key }}</h5>
                                @foreach($items as $item)
                                    @if($item['product_id'] == null)
                                        <p>{{ $item['title'] }}</p>
                                    @else
                                        <p><a href="{{ route('show-single-product', ['slug' => \App\Models\Product::find($item['product_id'])->slug]) }}">{{ $item['title'] }}</a></p>
                                    @endif
                                @endforeach
                            @endforeach
                            @foreach($recipe->ingredients as $ingredient)
                                @if($ingredient->group == null)
                                    @if($ingredient->product_id == null)
                                        <p>{{ $ingredient->title }}</p>
                                    @else
                                        <p><a href="#">{{ $ingredient->title }}</a></p>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            @foreach($ingredients as $ingredient)
                                @if($ingredient->type == 1)
                                    <p>{{ $ingredient->title }}</p>
                                @else
                                    <h5>{{ $ingredient->title }}</h5>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    @if($recipe->old_recipe == 0 && count($products) != 0)
                        <h4>Naši proizvodi</h4>
                        <div class="row recipe-products">
                            @foreach($products as $product)
                                <div class="col-4">
                                    <a href="{{ route('show-single-product', ['slug' => $product->slug]) }}">
                                        <img src="{{ asset('storage/upload/proizvod/' . $product->image_path) }}" alt="">
                                        <p>{{ $product->name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @elseif($recipe->old_recipe == 1 && count($products) != 0)
                        <h4>Naši proizvodi</h4>
                        <div class="row recipe-products">
                            @foreach($products as $product)
                                <div class="col-4">
                                    <a href="{{ route('show-single-product', ['slug' => $product->slug]) }}">
                                        <img src="{{ asset('storage/upload/proizvod/' . $product->image_path) }}" alt="">
                                        <p>{{ $product->name }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('show-all-categories') }}" class="mobile mobile-see-more-products">Vidi još proizvoda</a>
                    @endif
                </div>
                <div class="col-md-9">
                    <h1 class="desktop">{{ $recipe->title }}</h1>
                    <h4>Opis recepta</h4>
                    <p>{!! $recipe->description !!}</p>
                    @if($recipe->old_recipe == 0)
                        <h4>Kako se priprema?</h4>
                        @foreach($stepGroups as $key => $items)
                            <h5>{{ $key }}</h5>
                            @foreach($items as $item)
                                <p>{{ $item['title'] }}</p>
                            @endforeach
                        @endforeach
                        @foreach($recipe->steps as $step)
                            @if($step->group == null)
                                <p>{{ $step->title }}</p>
                            @endif
                        @endforeach
                    @endif

                    @guest()

                    @elseauth()
                        @if($recipe->old_recipe == 0)
                            <h4 class="author-h">Autor</h4>
                            <p class="author-name">{{ $recipe->user_recipe->name }} {{ $recipe->user_recipe->surname }}</p>
                        @else
                             @if($recipe->user != null)
                                <h4 class="author-h">Autor</h4>
                                <p class="author-name">{{ $recipe->user }}</p>
                            @endif
                        @endif
                    @endguest
{{--                    <p class="recipe-date">--}}
{{--                        Recept dodat:--}}
{{--                    </p>--}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" style="border-right: none;"></div>
                <div class="col-md-9">
                    <div class="tags">
                        <a href="{{ route('show-recipe-category', ['slug' => $recipe->category->slug]) }}">{{ $recipe->category->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="featured-recipes" class="featured-recipes">
        <div class="featured-recipes-inner container-space">
            <h2>Odabrani recepti</h2>
            <p>Pogledajte neke od najukusnijih recepata koje su pripremili ljubitelji slatke tradicije. Uživajte u pripremi i javite nam utiske.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            @if(isset($recipes[0]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[0]->category->slug, 'slug' => $recipes[0]->slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[0]->image_old) }}');"></div>
                                        <p>{{ $recipes[0]->title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if(isset($recipes[1]))
                                <a href="{{ route('show-single-recipe', ['category' => $recipes[1]->category->slug, 'slug' => $recipes[1]->slug]) }}">
                                    <div class="featured-recipe-single mini">
                                        <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[1]->image_old) }}');"></div>
                                        <p>{{ $recipes[1]->title }}</p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                    @if(isset($recipes[2]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[2]->category->slug, 'slug' => $recipes[2]->slug]) }}">
                            <div class="featured-recipe-single">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes[2]->image_old) }}');"></div>
                                <p>{{ $recipes[2]->title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    @if(isset($recipes[3]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes[3]->category->slug, 'slug' => $recipes[3]->slug]) }}">
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
                        <a href="{{ route('show-single-recipe', ['category' => $recipes2[0]->category->slug, 'slug' => $recipes2[0]->slug]) }}">
                            <div class="featured-recipe-single">
                                <div class="featured-image-cont" style="background-image: url('{{ asset('storage/upload/' . $recipes2[0]->image_old) }}');"></div>
                                <p>{{ $recipes2[0]->title }}</p>
                            </div>
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    @if(isset($recipes2[1]))
                        <a href="{{ route('show-single-recipe', ['category' => $recipes2[1]->category->slug, 'slug' => $recipes2[1]->slug]) }}">
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

    <section id="homepage-banner2">
        <img class="mobile" src="{{ asset('images/homepage-banner2-mobile.png') }}" alt="homepage banner2">
        <div class="homepage-banner-inner container-space">
            <div class="row">
                <div class="col-md-6">
                    <p>NAGRADNI KONKURS</p>
                    <h3>Učestvujte u konkursu<br>"Uskršnje torte i <br>kolači"</h3>
                    <a href="{{ route('show-competition') }}">Pošaljite recept</a>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('scriptsBottom')
    <script src="{{ asset('js/single-recipe.js') }}" type="text/javascript"></script>
    <script>
        let gallerySlider = new Swiper('.single-recipe-gallery', {
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        })
    </script>
@endsection
