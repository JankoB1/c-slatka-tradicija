<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;
use App\Services\RecipeService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected ProductService $productService;
    protected RecipeService $recipeService;

    public function __construct() {
        $this->productService = new ProductService();
        $this->recipeService = new RecipeService();
    }

    public function showAllCategories() {
        return view('products.categories');
    }

    public function showSingleCategory($slug) {
        $category = ProductCategory::where('slug', '=', $slug)->get()->first();
        $products = $category->products;
        return view('products.single-category', compact('category', 'products'));
    }

    public function showSingleProduct($slug) {
        $product = Product::where('slug', '=', $slug)->get()->first();
        $products = $product->productCategory->products;
        $recipes = $this->recipeService->getRecipesByProductIdOld($product->id);
//        dd($recipes);
        return view('products.single-product', compact('product', 'products', 'recipes'));
    }

    public function getAllProducts() {
        return response()->json($this->productService->getAllProducts());
    }

}
