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
    public function addRecipe(Request $request) {

        try {
            $slug = Str::slug($request->title);
            $user = Auth::user();
            $recipe = Recipe::create([
                'category_id'=>$request->cat,
                'user_id'=> $user->id,
                'title'=>$request->title,
                'slug'=>$slug,
                'difficulty' => $request->difficulty,
                'preparation_time' => $request->preparationTime,
                'preparation_description' => 'nista',
                'featured_image' => 'nista',
                'portion_number' => $request->portionNum,
                'description' => $request->description,
            ]);

            $recipe_id = $recipe->id;
            Log::info('Recipe id: ' . $recipe_id);
            return $recipe;

        } catch (QueryException $exception) {
            Log::error('Can\'t add recipe: ' . $exception->getMessage());
            return null;
        }
    }

    public function likeRecipe(RecipeRequest $request, $recipeId, bool $action)
    {
        $user = Auth::user();
        $recipe = Recipe::findOrFail($recipeId);
        $user->recipes_liked()->syncWithoutDetaching([$recipe->id => ['like' => $action]]);
        Log::info("User with ID: $user->id liked recipe with ID: $recipe->id");
        return response()->json(['message' => 'Recipe liked successfully']);
    }

    public function saveRecipe(RecipeRequest $request, $recipeId, bool $action)
    {
        $user = Auth::user();
        $recipe = Recipe::findOrFail($recipeId);
        $user->recipes_liked()->syncWithoutDetaching([$recipe->id => ['save' => $action]]);
        Log::info("User with ID: $user->id saved recipe with ID: $recipe->id");
        return response()->json(['message' => 'Recipe saved successfully']);
    }




    public function getRecipeBySlug($slug) {
        try {
            return Recipe::where('slug', '=', $slug)->get()->first();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve recipe by slug: ' . $exception->getMessage());
            return null;
        }
    }
}

// 'slug' => Str::slug('title', '-')
