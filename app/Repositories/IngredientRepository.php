<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\IngredientGroup;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function getIngredientsAll() {
        try {
            return Category::all();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve ingredients: ' . $exception->getMessage());
            return null;
        }
    }

    public function addIngredients(Request $request, int $recipe_id) {
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
                    'product_id' => $item['product'],
                    'title' => $item['title'],
                    'group' => $ingredient_group->id,
                ]);
            }
        }

        foreach($ingredients_without_group as $item) {
            Ingredient::create([
                'recipe_id' => $recipe_id,
                'product_id' => $item['product'],
                'title' => $item['title'],
                'group' => null,
            ]);
        }


    }
}
