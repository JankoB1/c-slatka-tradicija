<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


class ProductRepository
{
    public function getAllProductsByCategory(int $product_category_id) {
        try {
            return Product::where('product_category_id', '=', $product_category_id)->get();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve products: ' . $exception->getMessage());
            return null;
        }
    }
}
