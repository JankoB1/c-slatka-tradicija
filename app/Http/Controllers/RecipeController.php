<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ImageService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Services\RecipeService;
use App\Models\Recipe;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    protected RecipeService $recipeService;
    protected CategoryService $categoryService;
    protected ImageService $imageService;

    public function __construct() {
        $this->recipeService = new RecipeService();
        $this->categoryService = new CategoryService();
        $this->imageService = new ImageService();
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
        $recipe = $this->recipeService->addRecipe($request);

        foreach($request->input('images') as $image)
        {
            Log::alert("The image string is $image");
            Storage::disk('recipe_images_disk')->put('recipe_images/', $image);
            $this->imageService->addImage($image, $recipe->id);
        }

        return redirect()->route('recipes.retrieve')->with('success', 'Recipe created successfully');
    }
}
