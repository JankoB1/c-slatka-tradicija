<?php

namespace App\Repositories;

use App\Models\RecipeImages;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ImageRepository
{
    public function addImage($path, $recipe_id) {
        try {
            RecipeImages::create([
                'path' => $path,
                'recipe_id' => $recipe_id,
            ]);
        }
        catch (QueryException $exception) {
                Log::error('Can\'t upload image: ' . $exception->getMessage());
                return null;
            }
    }
}
