<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ImageService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Services\RecipeService;
use App\Models\Recipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Logging\Exception;

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

        DB::beginTransaction();

        try {

            $recipe = $this->recipeService->addRecipe($request);

            foreach( $request->file('images') as $image)
            {
                Storage::append("public_path() . /recipe_images/image", $image);
                $this->imageService->addImage($image, $recipe->id);
            }

            DB::commit();
        }
        catch (Exception $exception) {
            Log::error('Can\'t upload image: ' . $exception->getMessage());
            DB::rollBack();
            return null;
        }

        return redirect()->route('recipes.retrieve')->with('success', 'Recipe created successfully');
    }
}
