<?php

namespace App\Services;

use App\Repositories\IngredientGroupRepository;

class IngredientGroupService
{

    protected IngredientGroupRepository $ingredientGroupRepository;

    public function __construct() {
        $this->ingredientGroupRepository = new IngredientGroupRepository();
    }

    public function getGroupsByRecipeId($recipeId) {
        return $this->ingredientGroupRepository->getGroupsByRecipeId($recipeId);
    }

}
