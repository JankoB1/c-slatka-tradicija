<?php

namespace App\Repositories;

use App\Models\IngredientGroup;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class IngredientGroupRepository
{

    public function getGroupsByRecipeId($recipeId)
    {
        try {
            $ingredients = IngredientGroup::join('ingredients', 'ingredient_groups.id', '=', 'ingredients.group')
                ->where('ingredients.recipe_id', '=', $recipeId)
                ->get()
                ->toArray();

            $groupedIngredients = [];

            foreach ($ingredients as $ingredient) {
                $groupName = $ingredient['name'];
                if (!isset($groupedIngredients[$groupName])) {
                    $groupedIngredients[$groupName] = [];
                }
                $groupedIngredients[$groupName][] = $ingredient;
            }

            return $groupedIngredients;
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve ingredient groups by recipe id: ' . $exception->getMessage());
            return null;
        }
    }

}
