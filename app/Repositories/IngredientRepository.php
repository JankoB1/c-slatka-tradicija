<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\IngredientGroup;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class IngredientRepository
{
    public function getIngredientsC() {
        try {
            return Category::where('c_ingredient', true);
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve ingredients: ' . $exception->getMessage());
            return null;
        }
    }

    public function getIngredientsOld($recipeId) {
        return DB::select('SELECT title, type FROM tin_receptsastojak WHERE recipe_id = :recipeId',
            ['recipeId' => $recipeId]);
    }

    public function addIngredients(Request $request, int $recipe_id) {
        try {
            $all_ingredients = $request->input('ingredients');
            $groups = $all_ingredients['ingredientGroups'];
            $ingredients_without_group = $all_ingredients['ingredients'];

            foreach ($groups as $group) {
                $ingredient_group = IngredientGroup::create([
                    'name' => $group['name'],
                ]);
                foreach($group['ingredients'] as $item) {
                    Ingredient::create([
                        'recipe_id' => $recipe_id,
                        'product_id' => isset($item['product'])? $item['product']: null,
                        'title' => $item['title'],
                        'quantity' => $item['quantity'],
                        'measure' => isset($item['measure'])? $item['measure']: null,
                        'group' => $ingredient_group->id,
                    ]);
                }
            }

            foreach($ingredients_without_group as $item) {
                Ingredient::create([
                    'recipe_id' => $recipe_id,
                    'product_id' => isset($item['product'])? $item['product']: null,
                    'title' => $item['title'],
                    'quantity' => $item['quantity'],
                    'measure' => $item['measure'],
                    'group' => null,
                ]);
            }
        }
        catch (QueryException $exception) {
            Log::error('Can\'t add ingredients: ' . $exception->getMessage());
            return null;
        }

    }

    public function deleteIngredients($id) {
        try {
            $ingredients = Ingredient::where('recipe_id', '=', $id)->get();
            foreach ($ingredients as $ingredient) {
                $ingredient->delete();
            }
        }
        catch (QueryException $exception) {
            Log::error('Can\'t delete ingredients: ' . $exception->getMessage());
            return null;
        }
    }
}
