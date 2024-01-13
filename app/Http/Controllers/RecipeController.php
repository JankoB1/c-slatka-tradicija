<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Services\RecipeService;
use App\Models\Recipe;

class RecipeController extends Controller
{
    protected RecipeService $recipeService;
    protected CategoryService $categoryService;

    public function __construct() {
        $this->recipeService = new RecipeService();
        $this->categoryService = new CategoryService();
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
        return view('recipes.create', ['categories' => $categories]);
    }

    public function store(FormRequest $request) {
        $this->recipeService->addRecipe($request);
        return redirect()->route('recipes.retrieve')->with('success', 'Recipe created successfully');
    }
}
