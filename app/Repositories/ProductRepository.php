<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


class ProductRepository
{
    public function getAllProducts() {
        try {
            return Product::all();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve products: ' . $exception->getMessage());
            return null;
        }
    }

    public function getAllProductsMadeByC() {

    }
}
