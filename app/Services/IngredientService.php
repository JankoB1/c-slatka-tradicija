<?php

namespace App\Services;

use App\Repositories\IngredientRepository;
use http\Client\Request;
use Illuminate\Foundation\Http\FormRequest;


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
        return $this->ingredientRepository->addIngredients($request, $recipe_id);
    }
}
