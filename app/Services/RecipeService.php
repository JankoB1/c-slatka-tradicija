<?php

namespace App\Services;

use App\Repositories\RecipeRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RecipeService
{
    protected RecipeRepository $recipeRepository;

    public function __construct() {
        $this->recipeRepository = new RecipeRepository();
    }

    public function addRecipe(FormRequest $request) {
        return $this->recipeRepository->addRecipe($request);
    }

    public function getRecipe() {
        //
    }
}
