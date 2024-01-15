<?php

namespace App\Repositories;

use App\Models\RecipeImages;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ImageRepository
{
    public function addImage($path, $recipeId) {
        try {
            RecipeImages::create([
                'path' => $path,
                'recipeId' => $recipeId
            ]);
        }
        catch (QueryException $exception) {
                Log::error('Can\'t upload image: ' . $exception->getMessage());
                return null;
            }
    }
}
