<?php

namespace App\Services;

use App\Repositories\IngredientRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class IngredientService
{
    protected IngredientRepository $ingredientRepository;

    public function __construct() {
        $this->ingredientRepository = new IngredientRepository();
    }

    public function getIngredientsC() {
        return $this->ingredientRepository->getIngredientsC();
    }

    public function addIngredients(Request $request, int $recipe_id) {
        $this->ingredientRepository->addIngredients($request, $recipe_id);
    }

    public function getIngredientsOld($recipeId) {
        return $this->ingredientRepository->getIngredientsOld($recipeId);
    }
}
