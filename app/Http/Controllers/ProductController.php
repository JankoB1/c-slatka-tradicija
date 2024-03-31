<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\RecipeRepository;
use App\Services\PostService;
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
        $this->postService = new PostService();
    }

    public function showAllCategories() {
        return view('products.categories');
    }

    public function showSingleCategory($slug) {
        $category = ProductCategory::where('slug', '=', $slug)->get()->first();
        $products = $category->products;
        $recipes = $this->recipeRepository->getRecipeByProductIdOld($products[0]->id);
        return view('products.single-category', compact('category', 'products', 'recipes'));
    }

    public function showSingleProduct($slug) {
        $product = Product::where('slug', '=', $slug)->get()->first();
        $products = $product->productCategory->products;
        $recipes = $this->recipeService->getRecipesByProductIdOld($product->id);
        if($product->productCategory->id == 5) {
            $products = ProductCategory::where('slug', '=', 'slag-kremovi')->get()->first()->products;
        } else if($product->productCategory->id == 4) {
            $products = ProductCategory::where('slug', '=', 'puding')->get()->first()->products;
        }
        return view('products.single-product', compact('product', 'products', 'recipes'));
    }

    public function getAllProducts() {
        return response()->json($this->productService->getAllProducts());
    }

}
