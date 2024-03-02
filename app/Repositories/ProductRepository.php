<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


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

    public function getProductsOld(string $recipeId) {

    }

    public function getAllProducts() {
        try {
            return Product::all();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve products: ' . $exception->getMessage());
            return null;
        }
    }
}
