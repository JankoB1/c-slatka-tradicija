<?php

namespace App\Services;

use App\Repositories\IngredientRepository;

class IngredientService
{
    protected IngredientRepository $ingredientRepository;

    public function __construct() {
        $this->ingredientRepository = new IngredientRepository();
    }

    public function getIngredientsC() {
        return $this->ingredientRepository->getIngredientsC();
    }

    public function addIngredients() {
        return $this->ingredientRepository->addIngredients();
    }
}
