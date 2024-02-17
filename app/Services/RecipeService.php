<?php

namespace App\Services;

use App\Repositories\IngredientRepository;
use App\Repositories\RecipeRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;

class RecipeService
{
    protected RecipeRepository $recipeRepository;
    protected IngredientRepository $ingredientRepository;

    public function __construct() {
        $this->recipeRepository = new RecipeRepository();
        $this->ingredientRepository = new IngredientRepository();
    }

    public function addRecipe(Request $request) {
        return $this->recipeRepository->addRecipe($request);
    }

    public function getRecipeBySlug($slug) {
        return $this->recipeRepository->getRecipeBySlug($slug);
    }

    public function likeRecipe(Request $request, int $recipe_id, bool $action)
    {
        return $this->recipeRepository->likeRecipe($request, $recipe_id,  $action);
    }


    public function saveRecipe(Request $request, int $recipe_id, bool $action)
    {
        return $this->recipeRepository->saveRecipe($request, $recipe_id,  $action);
    }
}
