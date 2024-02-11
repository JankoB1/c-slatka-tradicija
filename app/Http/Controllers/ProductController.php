<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

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

}
