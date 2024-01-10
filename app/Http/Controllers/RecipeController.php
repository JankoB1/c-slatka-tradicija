<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RecipeService;
use App\Models\Recipe;

class RecipeController extends Controller
{
    protected RecipeService $recipeService;

    public function __construct() {
        $this->recipeService = new RecipeService();
    }
    public function retrieve() {
        $recipes = Recipe::all();
        return view('recipes.retrieve', ['recipes' => $recipes]);
    }

    public function create() {
        return view('recipes.create');
    }

    public function store(Request $request) {
        $this->recipeService->addRecipe($request);
        return redirect()->route('recipes.retrieve')->with('success', 'Recipe created successfully');
    }
}
