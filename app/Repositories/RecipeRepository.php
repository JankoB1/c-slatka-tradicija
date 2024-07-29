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
                'category_id'=>$request->subCat,
                'user_id'=> $user->id,
                'title'=>$request->title,
                'slug'=>$this->createSlug($request->title),
                'difficulty' => $request->difficulty,
                'preparation_time' => $request->preparationTime,
                'portion_number' => $request->portionNum,
                'description' => $request->description,
                'active' => 'T',
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

    public function edtiRecipe(Request $request) {
        try {
            $recipe = Recipe::find($request->recipe_id);
            $recipe->category_id = $request->subCat;
            $recipe->title = $request->title;
            $recipe->difficulty = $request->difficulty;
            $recipe->preparation_time = $request->preparationTime;
            $recipe->portion_number = $request->portionNum;
            $recipe->description = $request->description;
            $recipe->save();
            return $recipe;
        } catch (QueryException $exception) {
            Log::error('Can\'t add recipe: ' . $exception->getMessage());
            return null;
        }
    }

    public function searchRecipe($keyword)
    {
        $recipeIdsByTitle = $this->searchRecipesByTitle($keyword);
        $recipeIdsByIngredients = $this->searchIngredients($keyword);

        $recipeIds = array_unique(array_merge($recipeIdsByTitle, $recipeIdsByIngredients));
        return $this->getRecipes($recipeIds, $keyword, $recipeIdsByTitle);
    }

    private function searchRecipesByTitle($keyword)
    {
        return Recipe::where('title', 'like', '%' . $keyword . '%')
            ->where('active', 'T')
            ->pluck('id')
            ->toArray();
    }

    private function searchIngredients($keyword)
    {
        $oldIngredients = DB::table('tin_receptsastojak')
            ->where('tin_receptsastojak.title', 'like', '%' . $keyword . '%')
            ->pluck('tin_receptsastojak.recipe_id')
            ->toArray();

        $newIngredients = DB::table('ingredients')
            ->where('ingredients.title', 'like', '%' . $keyword . '%')
            ->pluck('ingredients.recipe_id')
            ->toArray();

        // Combine and deduplicate results
        $recipeIds = array_unique(array_merge($oldIngredients, $newIngredients));

        return $recipeIds;
    }

    private function getRecipes($recipeIds, $keyword, $recipeIdsByTitle)
    {
        $recipes = Recipe::whereIn('id', $recipeIds)
            ->where('active', '=', 'T')
            ->orderByRaw('FIELD(id, ' . implode(',', $recipeIdsByTitle) . ') DESC') // Prioritize title matches
            ->orderByRaw("CASE WHEN image_old = 'recipe-no-image.png' THEN 2 WHEN image_old = 'c-slatka-tradicija-recepti-2.jpg' THEN 1 ELSE 0 END")
            ->orderBy('created_at', 'desc')
            ->paginate(21)
            ->appends(['keyword' => $keyword]);

        return $recipes;
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
                ->join('categories', 'categories.id', '=', 'recipes.category_id')
                ->where('tin_receptproizvod.product_id', $product_id)
                ->whereNotIn('recipes.image_old', ['recipe-no-image.png', 'c-slatka-tradicija-recepti-2.jpg'])
                ->select('recipes.title as recipe_title', 'recipes.slug as recipe_slug', 'categories.slug as category_slug', 'recipes.image_old as image', 'recipes.id as id')
                ->take(4)
                ->get();
        } catch(QueryException $exception) {
            Log::error('Can\'t retrieve recipe by product_id: ' . $exception->getMessage());
            return null;
        }
    }

    public function getRecipeByCategoryIdOld(int $categoryId) {
        return DB::select('SELECT * FROM recipes WHERE category_id = :categoryId',
            ['categoryId' => $categoryId]);
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

    public function getRecipeLikes($id) {
        try {
            return UserRecipe::where('recipe_id', '=', $id)
                ->where('like', '=', 1)
                ->get();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve recipe likes: ' . $exception->getMessage());
            return null;
        }
    }

    public function getUserLiked($recipe_id, $user_id) {
        try {
            return UserRecipe::where('recipe_id', '=', $recipe_id)
                ->where('user_id', '=', $user_id)
                ->where('like', '=', 1)
                ->get()
                ->first();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve user liked: ' . $exception->getMessage());
            return null;
        }
    }

    public function getUserSaved($user_id) {
        try {
            return UserRecipe::where('user_id', '=', $user_id)
                ->where('save', '=', 1)
                ->get();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve user liked: ' . $exception->getMessage());
            return null;
        }
    }

    public function getUserSavedSingle($user_id, $recipe_id) {
        try {
            return UserRecipe::where('user_id', '=', $user_id)
                ->where('recipe_id', '=', $recipe_id)
                ->where('save', '=', 1)
                ->get()
                ->first();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve user save single: ' . $exception->getMessage());
            return null;
        }
    }

    public function softDelete($recipe_id)
    {
        try {
            $recipe = Recipe::find($recipe_id);
            $recipe_likes = UserRecipe::where('recipe_id', '=', $recipe_id);
            $recipe->delete();
            $recipe_likes->delete();
            return redirect()->route('show-all-recipes');
        } catch (QueryException $exception) {
            Log::error('Can\'t soft delete recipe. ' . $exception->getMessage());
            return null;
        }
    }
}
