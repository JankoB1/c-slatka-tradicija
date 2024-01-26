<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\IngredientService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Services\RecipeService;
use App\Models\Recipe;

class RecipeController extends Controller
{
    protected RecipeService $recipeService;
    protected CategoryService $categoryService;
    protected IngredientService $ingredientService;

    public function __construct() {
        $this->recipeService = new RecipeService();
        $this->categoryService = new CategoryService();
        $this->ingredientService = new IngredientService();
    }

    public function index() {
        return view('homepage');
    }

    public function retrieve() {
        $recipes = Recipe::all();
        return view('recipes.retrieve', ['recipes' => $recipes]);
    }

    public function create() {
        $categories = $this->categoryService->getCategories();
        $ingredients = $this->ingredientService->getIngredientsC();
        return view('recipes.create', [
            'categories' => $categories,
            'ingredients' => $ingredients,
        ]);
    }

    public function store(FormRequest $request) {
        $this->recipeService->addRecipe($request);
        $this->ingredientService->addIngredients($request);
        return redirect()->route('recipes.retrieve')->with('success', 'Recipe created successfully');
    }
}
