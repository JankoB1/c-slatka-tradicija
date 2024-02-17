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

            $user = Auth::user();
            $recipe = Recipe::create([
                'category_id'=>$request->cat,
                'user_id'=> $user->id,
                'title'=>$request->title,
                'slug'=>$this->createSlug($request->title),
                'difficulty' => $request->difficulty,
                'preparation_time' => $request->preparationTime,
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

    public function createSlug(string $title, int $increment = 0)
    {
        $slug = Str::slug($title);
        if ($increment > 0) {
            $slug .= '-' . $increment; // Append numeric suffix if needed
        }
        $existingSlug = Recipe::where('slug', $slug)->exists(); // Checking if slug already exists
        if ($existingSlug) {
            // If slug already exists, recursively call the function with an incremented counter
            return $this->createSlug($title, $increment + 1);
        }
        return $slug;

    }

    public function likeRecipe(Request $request, $recipeId, bool $action)
    {
        $user = Auth::user();
        $user->recipes_liked->syncWithoutDetaching([$recipeId => ['like' => $action]]);
        Log::info("User with ID: $user->id liked recipe with ID: $recipeId");
        return response()->json(['message' => 'Recipe liked successfully']);
    }

    public function saveRecipe(RecipeRequest $request, $recipeId, bool $action)
    {
        $user = Auth::user();
        $user->recipes_liked()->syncWithoutDetaching([$recipeId => ['save' => $action]]);
        Log::info("User with ID: $user->id saved recipe with ID: $recipeId");
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
