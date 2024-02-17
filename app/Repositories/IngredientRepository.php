<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\IngredientGroup;
use Illuminate\Http;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
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
        $groups = $all_ingredients->input('ingredientGroups');
        $ingredients_without_group = $all_ingredients->input('ingredients');


        foreach ($groups as $ingredient_group) {
            $ingredient_group_id = IngredientGroup::create([
                'name' => $ingredient_group->input('name'),
            ]);

            foreach($ingredient_group as $item) {
                $ingredients_in_group = $item->input('ingredients');
                Ingredient::create([
                    'recipe_id' => $recipe_id,
                    'product_id' => $ingredients_in_group->product_id,
                    'title' => $ingredients_in_group,
                    'group' => $ingredient_group_id,
                ]);
            }
        }

        foreach($ingredients_without_group as $item) {
            Ingredient::create([
                'recipe_id' => $recipe_id,
                'product_id' => $ingredients_in_group->product_id,
                'title' => $ingredients_in_group,
                'group' => null,
            ]);
        }


    }
}
