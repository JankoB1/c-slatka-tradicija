<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories() {
        try {
            return Category::where('parent_id', null)->get();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve categories: ' . $exception->getMessage());
            return null;
        }
    }

    public function getAllSubcategories(int $parent_id) {
        try {
            return Category::where('parent_id', $parent_id)->get();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve categories: ' . $exception->getMessage());
            return null;
        }
    }


}
