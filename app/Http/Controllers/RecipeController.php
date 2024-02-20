<?php

namespace App\Http\Controllers;

use App\Models\Step;
use App\Repositories\StepRepository;
use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\IngredientGroupService;
use App\Services\IngredientService;
use Illuminate\Foundation\Http\FormRequest;
use App\Services\RecipeService;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Logging\Exception;

class RecipeController extends Controller
{
    protected RecipeService $recipeService;
    protected CategoryService $categoryService;
    protected ImageService $imageService;
    protected IngredientService $ingredientService;
    protected StepRepository $stepRepository;
    protected IngredientGroupService $ingredientGroupService;

    public function __construct() {
        $this->recipeService = new RecipeService();
        $this->categoryService = new CategoryService();
        $this->imageService = new ImageService();
        $this->ingredientService = new IngredientService();
        $this->stepRepository = new StepRepository();
        $this->ingredientGroupService = new IngredientGroupService();
    }

    public function index() {
        return view('homepage');
    }

    public function retrieve() {
        $recipes = Recipe::all();
        return view('recipes.retrieve', ['recipes' => $recipes]);
    }

    public function retrieveSingleRecipe(string $slug) {
        $recipe = $this->recipeService->getRecipeBySlug($slug);
        $ingredientGroups = $this->ingredientGroupService->getGroupsByRecipeId($recipe->id);
        return view('recipes.show', compact('recipe', 'ingredientGroups'));
    }

    public function create() {
        $categories = $this->categoryService->getAllCategories();
        $ingredients = $this->ingredientService->getIngredientsC();

        return view('recipes.create', [
            'categories' => $categories,
            'ingredients' => $ingredients,
        ]);
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {

            $recipe = $this->recipeService->addRecipe($request);

            $type = gettype($request->file('images'));
            Log::info("Image type is $type");
//            dd($recipe);
            $recipe_id = $recipe->id;
            Log::info('Recipe id is: ' . $recipe_id);
            $this->ingredientService->addIngredients($request, $recipe_id);
            $this->stepRepository->addSteps($request, $recipe_id);

            /*
            foreach( $request->file('images') as $image)
            {
                Storage::append("public_path() . /recipe_images/image", $image);
                $this->imageService->addImage($image, $recipe_id);
            }
            */
            /*
            foreach ($request->file('images') as $image) {
                $path = $image->store('recipe_images', 'public');
                $this->imageService->addImage($path, $recipe_id);
            }
            */
            DB::commit();
            return redirect()->route('recipes.retrieve')->with('success', 'Recipe created successfully');

        }
        catch (Exception $exception) {
            Log::error('Can\'t upload image: ' . $exception->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create recipe. Please try again.');
        }
    }

    public function likeRecipe(Request $request)
    {
        $this->recipeService->likeRecipe($request);
    }

    public function saveRecipe(Request $request)
    {
        $this->recipeService->saveRecipe($request);

    }

    public function showRecipeBook() {
        return view('recipes-book');
    }
}
