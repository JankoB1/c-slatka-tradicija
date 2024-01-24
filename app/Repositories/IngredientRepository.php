<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class IngredientRepository
{
    public function getIngredientsC() {
        try {
            return Category::where('c_ingredient', true);
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve ingredients: ' . $exception->getMessage());
            return null;
        }
    }

    public function getIngredientsAll() {
        try {
            return Category::all();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve ingredients: ' . $exception->getMessage());
            return null;
        }
    }
}
