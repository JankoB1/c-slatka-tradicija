<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Step;
use App\Repositories\ProductRepository;
use App\Repositories\StepRepository;
use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\IngredientGroupService;
use App\Services\IngredientService;
use App\Services\StepGroupService;
use Illuminate\Foundation\Http\FormRequest;
use App\Services\RecipeService;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    protected ProductRepository $productRepository;
    protected IngredientGroupService $ingredientGroupService;
    protected StepGroupService $stepGroupService;

    public function __construct() {
        $this->recipeService = new RecipeService();
        $this->categoryService = new CategoryService();
        $this->imageService = new ImageService();
        $this->ingredientService = new IngredientService();
        $this->stepRepository = new StepRepository();
        $this->ingredientGroupService = new IngredientGroupService();
        $this->stepGroupService = new StepGroupService();
        $this->productRepository = new ProductRepository();
    }

    public function index() {
        $recipes = $this->recipeService->getRecipesByProductIdOld(1);
        $recipes2 = $this->recipeService->getRecipesByProductIdOld(3);
        return view('homepage', compact('recipes', 'recipes2'));
    }

    public function showAbout() {
        return view('about');
    }

    public function retrieve() {
        $recipes = Recipe::all();
        return view('recipes.retrieve', ['recipes' => $recipes]);
    }

    public function retrieveSingleRecipe(string $category, string $slug) {
        $recipe = $this->recipeService->getRecipeBySlug($slug);
        $likes = $this->recipeService->getRecipeLikes($recipe->id);
        $user_data = [
            'like' => null,
            'save' => null
        ];
        $recipes = $this->recipeService->getRecipesByProductIdOld(1);
        $recipes2 = $this->recipeService->getRecipesByProductIdOld(3);

        if(Auth::user()) {
            $user_data['like'] = $this->recipeService->getUserLiked($recipe->id, Auth::user()->id);
            $user_data['save'] = $this->recipeService->getUserSavedSingle(Auth::user()->id, $recipe->id);
        }
        if($recipe->old_recipe == 1) {
            $ingredients = $this->ingredientService->getIngredientsOld($recipe->id);
            $products = $this->productRepository->getProductsOld($recipe->id);
            return view('recipes.show', compact('recipe', 'ingredients', 'products', 'likes', 'user_data', 'recipes', 'recipes2'));
        }
        $ingredientGroups = $this->ingredientGroupService->getGroupsByRecipeId($recipe->id);
        $stepGroups = $this->stepGroupService->getGroupsByRecipeId($recipe->id);
        $products = $this->productRepository->getProductByRecipeId($recipe->id);
        return view('recipes.show', compact('recipe', 'ingredientGroups', 'stepGroups', 'products', 'likes', 'user_data', 'recipes', 'recipes2'));
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
            $this->ingredientService->addIngredients($request, $recipe->id);
            $this->stepRepository->addSteps($request, $recipe->id);
            $this->imageService->addImage($request, $recipe->id);
            $this->imageService->removeImage($request);
            $data = [
                'recipe_slug' => $recipe->slug,
                'category_slug' => $recipe->category->slug
            ];
            DB::commit();
            return response($data);
        }
        catch (Exception $exception) {
            Log::error('Can\'t upload image: ' . $exception->getMessage());
            DB::rollBack();
            return response('Error');
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

    public function saveToSession(Request $request) {
        $this->recipeService->saveToSession($request);
    }

    public function showRecipeCategory($slug) {
        $category = Category::where('slug', '=', $slug)->get()->first();
        $recipes = $category->recipes()->orderBy('created_at', 'desc')->paginate(21);
        return view('recipes.category', compact('category', 'recipes'));
    }

    public function showAllCategories() {
        return view('recipes.recipes');
    }

    public function showCompetition() {
        return view('competition');
    }

    public function showContact() {
        return view('contact');
    }

    public function showImpressum() {
        return view('impressum');
    }

    public function getRecipesByIds(Request $request) {
        $recipes = Recipe::whereIn('id', $request->recipes)->get();
        return response()->json($recipes);
    }

    public function showPrivacyNote() {
        return view('privacy-note');
    }

    public function showPrivacyPolicy() {
        return view('privacy-policy');
    }

    public function softDelete($user_id) {
        $this->recipeService->softDelete($user_id);
    }
}
