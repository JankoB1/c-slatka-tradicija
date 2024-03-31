<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class ProductRepository
{
    public function getAllProductsByCategory(int $product_category_id) {
        try {
            $category = ProductCategory::findOrFail($product_category_id);
            return $category->products();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve products: ' . $exception->getMessage());
            return null;
        }
    }

    public function getProductsOld(int $recipeId) {
         return DB::table('products')
            ->join('tin_receptproizvod', 'products.id', '=', 'tin_receptproizvod.product_id')
            ->where('tin_receptproizvod.recipe_id', $recipeId)
             ->where('products.active', '=', 'T')
             ->select('products.*')
            ->get();
    }

    public function getProductByRecipeId(int $recipeId) {
        return DB::table('products')
            ->join('ingredients', 'products.id', '=', 'ingredients.product_id')
            ->where('ingredients.recipe_id', $recipeId)
            ->where('products.active', '=', 'T')
            ->select('products.*')
            ->distinct()
            ->get();
    }

    public function getAllProducts() {
        try {
            return Product::where('active', '=', 'T')->get();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve products: ' . $exception->getMessage());
            return null;
        }
    }
}
