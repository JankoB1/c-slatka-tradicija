@extends('layouts.app')

@section('title', 'Svi recepti')

<section id="featured-recipes">
    <div class="featured-recipes-inner container-space">
        <h2>Recepti korisnika</h2>
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
