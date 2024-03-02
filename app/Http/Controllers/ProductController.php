<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\RecipeRepository;
use App\Services\ProductService;
use App\Services\RecipeService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected ProductService $productService;
    protected RecipeService $recipeService;
    protected RecipeRepository $recipeRepository;

    public function __construct() {
        $this->productService = new ProductService();
        $this->recipeService = new RecipeService();
        $this->recipeRepository = new RecipeRepository();
    }

    public function showAllCategories() {
        return view('products.categories');
    }

    public function showSingleCategory($slug) {
        $category = ProductCategory::where('slug', '=', $slug)->get()->first();
        $products = $category->products;
        $recipes = $this->recipeRepository->getRecipeByProductIdOld($category->id);
        return view('products.single-category', compact('category', 'products', 'recipes'));
    }

    public function showSingleProduct($slug) {
        $product = Product::where('slug', '=', $slug)->get()->first();
        $products = $product->productCategory->products;
        $recipes = $this->recipeService->getRecipesByProductIdOld($product->id);
        dd($recipes);
        return view('products.single-product', compact('product', 'products', 'recipes'));
    }

    public function getAllProducts() {
        return response()->json($this->productService->getAllProducts());
    }

}
