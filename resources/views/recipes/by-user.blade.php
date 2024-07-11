@extends('layouts.app')

@section('title', 'Svi recepti')

<section id="featured-recipes" style="margin-top: 70px;">
    <div class="featured-recipes-inner container-space">
        @if($user->image_path != null)
            <div style="background-image: url('{{ asset('storage/' . $user->image_path) }}');" class="profile-img profile-img-recipes"></div>
        @else
            <div style="background-image: url('{{ asset('images/avatar.png') }}');" class="profile-img profile-img-recipes"></div>
        @endif
        <h2>{{ $user->username }}</h2>
        <div class="user-socials">
            <a href="{{ $user->fb }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ $user->ig }}" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="row">
            @foreach($recipes as $recipe)
                <div class="col-md-4">
                    <a class="single-recipe-link" href="{{ route('show-single-recipe', ['id' => $recipe->id, 'category' => $recipe->category->slug, 'slug' => $recipe->slug]) }}">
                        <div class="single-recipe-preview">
                            @if(isset($recipe->images[0]) && $recipe->old_recipe == 0)
                                <div class="recipe-preview-img" style="background-image: url('{{ asset('storage/upload/' . $recipe->images[0]->path) }}')">

                                </div>
                            @elseif($recipe->old_recipe == 1)
                                <div class="recipe-preview-img" style="background-image: url('{{ asset('storage/upload/' . $recipe->image_old) }}')">

                                </div>
                            @else
                                <div class="recipe-preview-img" style="background-image: url('{{ asset('images/recipe-no-image.png') }}"></div>
                            @endif
                            <p>{{ $recipe->title }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="pagination">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>
</section>
