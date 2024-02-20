<?php

namespace App\Repositories;

use App\Models\RecipeImages;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ImageRepository
{
    public function addImage($path, $recipe_id) {
        try {
            return RecipeImages::create([
                'path' => $path,
                'recipe_id' => $recipe_id,
            ])->path;

        }
        catch (QueryException $exception) {
                Log::error('Can\'t upload image: ' . $exception->getMessage());
                return null;
            }
    }

    public function getImageByPath($path) {
        try {
            return RecipeImages::where('path', '=', $path)->get()->first();
        } catch (QueryException $exception) {
            Log::error('Can\'t get image by path: ' . $exception->getMessage());
            return null;
        }
    }


}
