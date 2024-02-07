<?php

namespace App\Services;

use App\Repositories\RecipeRepository;
use Illuminate\Foundation\Http\FormRequest;

class RecipeService
{
    protected RecipeRepository $recipeRepository;

    public function __construct() {
        $this->recipeRepository = new RecipeRepository();
    }

    public function addRecipe(FormRequest $request) {
        return $this->recipeRepository->addRecipe($request);
    }

    public function getRecipeBySlug($slug) {
        return $this->recipeRepository->getRecipeBySlug($slug);
    }
}
