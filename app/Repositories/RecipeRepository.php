<?php

namespace App\Repositories;

use App\Models\UserRecipe;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Recipe;


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
                'active' => 'F',
                'old_recipe' => 0
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
            $slug .= '-' . $increment;
        }
        $existingSlug = Recipe::where('slug', $slug)->exists();
        if ($existingSlug) {
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

    public function getRecipeByProductIdOld($product_id) {
        try {
            return DB::table('recipes')
                ->join('tin_receptproizvod', 'recipes.id', '=', 'tin_receptproizvod.recipe_id')
                ->where('tin_receptproizvod.product_id', $product_id)
                ->select('recipes.*')
                ->take(4)
                ->get();
        } catch(QueryException $exception) {
            Log::error('Can\'t retrieve recipe by product_id: ' . $exception->getMessage());
            return null;
        }
    }

    public function getRecipeByProductId($product_id) {
        try {
            return DB::table('recipes')
                ->join('ingredients', 'recipes.id', '=', 'ingredients.recipe_id')
                ->where('ingredients.product_id', $product_id)
                ->select('recipes.*')
                ->distinct()
                ->take(4)
                ->get();
        } catch(QueryException $exception) {
            Log::error('Can\'t retrieve recipe by product_id: ' . $exception->getMessage());
            return null;
        }
    }

    public function saveToSession(Request $request) {
        $recipe_id = $request->recipe_id;
        $recipes = $request->session()->get('recipes', []);
        $key = array_search($recipe_id, $recipes);

        if ($key !== false) {
            unset($recipes[$key]);
        } else {
            $recipes[] = $recipe_id;
        }

        $request->session()->put('recipes', $recipes);
        $request->session()->save();

        $data = $request->session()->all();
        dd($data);
    }
}

// 'slug' => Str::slug('title', '-')
