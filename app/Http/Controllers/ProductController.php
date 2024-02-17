<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected ProductService $productService;

    public function __construct() {
        $this->productService = new ProductService();
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
        return view('products.single-product', compact('product', 'products'));
    }

    public function getAllProducts() {
        return response()->json($this->productService->getAllProducts());
    }

}
