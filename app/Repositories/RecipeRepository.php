<?php

namespace App\Repositories;

use App\Models\UserRecipe;
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

    public function likeRecipe(Request $request)
    {
        $user = Auth::user();
        return UserRecipe::updateOrCreate(
            ['user_id' => $user->id, 'recipe_id' => $request->recipe_id],
            ['like' => $request->action,
            ]);
    }

    public function saveRecipe(Request $request)
    {
        $user = Auth::user();
        return UserRecipe::updateOrCreate(
            ['user_id' => $user->id, 'recipe_id' => $request->recipe_id],
            ['save' => $request->action,
            ]);
    }

    public function getRecipeBySlug($slug) {
        try {
            return Recipe::where('slug', '=', $slug)->get()->first();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve recipe by slug: ' . $exception->getMessage());
            return null;
        }
    }

    public function saveToSession(Request $request) {
        $recipe_id = $request->input('recipe_id');
        $saved_recipes = $request->session()->get('saved_recipes', []);

        if (!in_array($recipe_id, $saved_recipes)) {
            $savedRecipes[] = $recipe_id;
            $request->session()->put('saved_recipes', $savedRecipes);
        }


    }
}

// 'slug' => Str::slug('title', '-')
