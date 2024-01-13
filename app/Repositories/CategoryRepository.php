<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories() {
        try {
            return Category::all();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve categories: ' . $exception->getMessage());
            return null;
        }
    }

    public function getAllCategoriesWithRecipesCount() {
        try {
            //
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve categories: ' . $exception->getMessage());
            return null;
        }
    }


}
