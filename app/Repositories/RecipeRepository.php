<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Http\Requests\RecipeRequest;


class RecipeRepository
{
    public function addRecipe(FormRequest $request) {

        try {
            $request->validated();
            $slug = Str::slug($request->title);
            $user = Auth::user();

            $recipe = Recipe::create([
                'category_id'=>$request->category,
                'user_id'=> $user->id,
                'title'=>$request->title,
                'slug'=>$slug,
                'difficulty' => $request->difficulty,
                'preparation_time' => $request->preparation_time,
                'portion_number' => $request->portion_number,
                'description' => $request->description,
                'preparation_description' => $request->preparation_description,
            ]);

            $recipe_id = $recipe->id;
            Log::info('Recipe id: ' . $recipe_id);
            return $recipe;

        } catch (QueryException $exception) {
            Log::error('Can\'t add recipe: ' . $exception->getMessage());
            return null;
        }
    }

    public function getRecipeBySlug($slug) {
        try {
            return Recipe::where('slug', '=', $slug)->get()->first();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve recipe by slug: ' . $exception->getMessage());
            return null;
        }
    }

    public function getRecipeByCategory($category_id) {
        try {
            return Recipe::where('category_id', '=', $category_id)->get();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve recipe by category: ' . $exception->getMessage());
            return null;
        }
    }

}

// 'slug' => Str::slug('title', '-')
