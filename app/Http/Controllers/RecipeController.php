<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Services\RecipeService;
use App\Models\Recipe;

class RecipeController extends Controller
{
    protected RecipeService $recipeService;

    public function __construct() {
        $this->recipeService = new RecipeService();
    }

    public function index() {
        return view('homepage');
    }

    public function retrieve() {
        $recipes = Recipe::all();
        return view('recipes.retrieve', ['recipes' => $recipes]);
    }

    public function create() {
        return view('recipes.create');
    }

    public function store(FormRequest $request) {
        $this->recipeService->addRecipe($request);
        return redirect()->route('recipes.retrieve')->with('success', 'Recipe created successfully');
    }
}
