<?php

namespace App\Http\Controllers;

use App\DataTables\RecipesDataTable;
use App\Models\Category;
use App\Models\Step;
use App\Models\User;
use App\Repositories\ProductRepository;
use App\Repositories\StepRepository;
use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\IngredientGroupService;
use App\Services\IngredientService;
use App\Services\ProductService;
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
    protected ProductService $productService;

    public function __construct() {
        $this->recipeService = new RecipeService();
        $this->categoryService = new CategoryService();
        $this->imageService = new ImageService();
        $this->ingredientService = new IngredientService();
        $this->stepRepository = new StepRepository();
        $this->ingredientGroupService = new IngredientGroupService();
        $this->stepGroupService = new StepGroupService();
        $this->productRepository = new ProductRepository();
        $this->productService = new ProductService();
    }

    public function index() {
        $recipes = Recipe::where('id', '=', 6933)
            ->orWhere('id', '=', 5275)
            ->orWhere('id', '=', 10103)
            ->orWhere('id', '=', 9421)
            ->get();

        $recipes2 = Recipe::where('id', '=', 9747)
            ->orWhere('id', '=', 10060)
            ->get();

        return view('homepage', compact('recipes', 'recipes2'));
    }

    public function showAbout() {
        return view('about');
    }

    public function retrieve() {
        $recipes = Recipe::all();
        return view('recipes.retrieve', ['recipes' => $recipes]);
    }

    public function retrieveSingleRecipe(string $category, string $slug, string $id) {
        $recipe = Recipe::find($id);
        if ($recipe == null)
            return redirect()->route('show-all-recipes');

        $likes = $this->recipeService->getRecipeLikes($recipe->id);
        $user_data = [
            'like' => null,
            'save' => null
        ];
        $recipes = Recipe::where('id', '=', 6933)
            ->orWhere('id', '=', 5275)
            ->orWhere('id', '=', 10103)
            ->orWhere('id', '=', 9421)
            ->get();

        $recipes2 = Recipe::where('id', '=', 9747)
            ->orWhere('id', '=', 10060)
            ->get();

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

    public function showEditRecipe($id) {
        $recipe = Recipe::find($id);
        if ($recipe == null)
            return redirect()->route('show-all-recipes');

        $ingredientGroups = $this->ingredientGroupService->getGroupsByRecipeId($recipe->id);
        $stepGroups = $this->stepGroupService->getGroupsByRecipeId($recipe->id);
        //$products = $this->productRepository->getProductByRecipeId($recipe->id);
        return view('auth.edit-recipe', compact('recipe', 'ingredientGroups', 'stepGroups'));
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
                'category_slug' => $recipe->category->slug,
                'recipe_id' => $recipe->id
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

    public function edit(Request $request) {
        DB::beginTransaction();
        try {
            $recipe = $this->recipeService->editRecipe($request);
            $this->ingredientService->deleteIngredients($recipe->id);
            $this->stepRepository->deleteSteps($recipe->id);
            $this->imageService->deleteImages($recipe->id, $request->imagesNotToDelete);

            $this->ingredientService->addIngredients($request, $recipe->id);
            $this->stepRepository->addSteps($request, $recipe->id);
            $this->imageService->addImage($request, $recipe->id);
            $this->imageService->removeImage($request);
            $data = [
                'recipe_slug' => $recipe->slug,
                'category_slug' => $recipe->category->slug,
                'recipe_id' => $recipe->id
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
        $recipes = $category->recipes()
            ->where('active', '=', 'T')
            ->orderByRaw("CASE WHEN image_old = 'recipe-no-image.png' THEN 2 WHEN image_old = 'c-slatka-tradicija-recepti-2.jpg' THEN 1 ELSE 0 END")
            ->orderBy('id', 'desc')
            ->paginate(21);
        return view('recipes.category', compact('category', 'recipes'));
    }

    public function showAllCategories() {
        return view('recipes.recipes');
    }

    public function showCompetition() {
        $winners = Recipe::where('winner', '=', 1)->get();
        $separated = Recipe::whereNotNull('contest_id')
            ->where('contest_id', '!=', 0)
            ->whereNull('deleted_at')
            ->get();
        $sortedGroupedRecipes = $separated->groupBy('contest_id');
        $groupedRecipes = $sortedGroupedRecipes->sortByDesc(function ($group, $key) {
            return $key;
        });
        return view('competition', compact('winners', 'groupedRecipes'));
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

    public function showCompetitionRules() {
        return view('competition-rules');
    }

    public function softDelete($recipe_id) {
        $this->recipeService->softDelete($recipe_id);
    }

    public function hideRecipe($id) {
        $recipe = Recipe::find($id);
        $recipe->active = 'F';
        $recipe->save();
    }

    public function showRecipe($id) {
        $recipe = Recipe::find($id);
        $recipe->active = 'T';
        $recipe->save();
    }

    public function winRecipe($id) {
        $recipe = Recipe::find($id);
        $recipe->contest_id = 2234;
        $recipe->save();
    }

    public function winRecipeDel($id) {
        $recipe = Recipe::find($id);
        $recipe->contest_id = 0;
        $recipe->save();
    }

    public function getRecipesByUser($userId)
    {
        $user = User::find($userId);
        $recipes = $user->recipes_sorted()->paginate(9);
        return view('recipes.by-user', compact('recipes', 'user'));
    }

    public function showAdminList(RecipesDataTable $dataTable) {
        if(Auth::user() == null || Auth::user()->admin == 0) {
            return redirect()->route('show-homepage');
        }
//        $recipes = Recipe::where('deleted_at', '=', null)
//            ->orderByDesc('id')
//            ->get();
//        return view('auth.admin.list', compact('recipes'));
        return $dataTable->render('auth.admin.list');
    }

    public function showSearchRecipe(Request $request) {
        $keyword = $request->keyword;
        $products = $this->productService->searchProducts($keyword);
        $recipes = $this->recipeService->searchRecipe($keyword);
        return view('recipes.search', compact( 'recipes', 'keyword', 'products'));
    }

    public function testShowCreate() {
        $categories = $this->categoryService->getAllCategories();
        $ingredients = $this->ingredientService->getIngredientsC();

        return view('recipes.create-test', [
            'categories' => $categories,
            'ingredients' => $ingredients,
        ]);
    }
}
