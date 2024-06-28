@extends('layouts.app')

@section('content')

    <section id="top-profile">
        <div class="container-space">
        </div>
    </section>

    <section id="my-profile-main">
        <div class="my-profile-main-inner container-space">
            <div class="row">
                <div class="col-md-2">
                    <input type="file" style="display: none;" class="image-input">
                    @if(Auth::user()->image_path != null)
                        <div style="background-image: url('{{ asset('storage/' . Auth::user()->image_path) }}');" class="profile-img"></div>
                    @else
                        <div style="background-image: url('{{ asset('images/avatar.png') }}');" class="profile-img"></div>
                    @endif
                </div>
                <div class="col-md-10">
                    <div class="profile-top-details">
                        <div class="left">
                            <h2>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h2>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                        <div class="right">
                            <a href="{{ route('show-edit-profile') }}">
                                <img src="{{ asset('images/settings-icon.svg') }}" alt="settings">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-details">
                        <h4>O meni</h4>
                        <div class="single-detail">
                            <img src="{{ asset('images/birthdate.svg') }}" alt="birthdate">
                            <span>{{ Auth::user()->birthdate }}</span>
                        </div>
                        <div class="single-detail">
                            <img src="{{ asset('images/city.svg') }}" alt="city">
                            <span>{{ Auth::user()->city }}</span>
                        </div>
                        <div class="single-detail">
                            <a href="{{ Auth::user()->fb }}">
                                <img src="{{ asset('images/fb-profile.svg') }}" alt="fb">
                                <span>Facebook profil</span>
                            </a>
                        </div>
                        <div class="single-detail">
                            <a href="{{ Auth::user()->ig }}">
                                <img src="{{ asset('images/ig-profile.svg') }}" alt="ig">
                                <span>Instagram profil</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="profile-recipes">
                        <div class="top-nav">
                            <div class="single-btn">
                                <p class="active">Objavljeni recepti</p>
                            </div>
                            <div class="single-btn">
                                <p>Sačuvani recepti</p>
                            </div>
                        </div>
                        <div class="profile-recipes-content row active">
                            @foreach(Auth::user()->recipes as $recipe)
                                <div class="col-md-4">
                                    <div class="single-recipe-preview" style="position:relative;">
                                        <a style="position:absolute; right: 20px; top: 20px; color: #2E4765" href="{{ route('show-edit-recipe', ['id' => $recipe->id]) }}"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('show-single-recipe', ['category' => $recipe->category->slug, 'id' => $recipe->id, 'slug' => $recipe->slug]) }}">
                                            @if($recipe->old_recipe == 1)
                                                <div class="recipe-preview-img" style="background-image: url('{{ asset('storage/upload/' . $recipe->image_old) }}');">

                                                </div>
                                            @else
                                                <div class="recipe-preview-img" style="background-image: url('{{ isset($recipe->images[0]) ? asset('storage/upload/' . $recipe->images[0]->path): asset('images/recipe-no-image.png') }}');">

                                                </div>
                                            @endif
                                            <p>{{ $recipe->title }}</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="profile-recipes-content profile-recipes-content-saved row">
                            @foreach($savedRecipes as $saved)
                                <div class="col-md-4">
                                    <div class="single-recipe-preview">
                                        <a href="{{ route('show-single-recipe', ['category' => $saved->category->slug, 'id' => $saved->recipe->id, 'slug' => $saved->recipe->slug]) }}">
                                            @if($saved->recipe->old_recipe == 1)
                                                <div class="recipe-preview-img" style="background-image: url('{{ asset('storage/upload/' . $saved->recipe->image_old) }}');">

                                                </div>
                                            @else
                                                <div class="recipe-preview-img" style="background-image: url('{{ isset($saved->recipe->images[0]) ? asset('storage/upload/' . $saved->recipe->images[0]->path): '' }}');">

                                                </div>
                                            @endif
                                            <p>{{ $saved->recipe->title }}</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scriptsBottom')
    <script type="text/javascript" src="{{ asset('js/my-profile.js') }}"></script>
@endsection
