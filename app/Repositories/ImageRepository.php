<?php

namespace App\Repositories;

use App\Models\RecipeImages;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function deleteImages($id, $imagesNotToDelete) {
        try {
            $images = RecipeImages::where('recipe_id', '=', $id)->get();
            foreach ($images as $image) {
                if(!in_array($image->id, $imagesNotToDelete)) {
                    $image->delete();
                }
            }
        }
        catch (QueryException $exception) {
            Log::error('Can\'t delete images: ' . $exception->getMessage());
            return null;
        }
    }

    public function saveMaskImage($image, $xOffset, $imageName, $recipe_id) {
        try {
            $imageData = $image;
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = base64_decode($imageData);
            $imageResource = imagecreatefromstring($imageData);

            $originalWidth = imagesx($imageResource);
            $originalHeight = imagesy($imageResource);

            $aspectRatio = $originalWidth / $originalHeight;
            $newWidth = 1920;
            $newHeight = $newWidth / $aspectRatio;

            $croppedImage = imagecrop($imageResource, [
                'x' => $xOffset,
                'y' => 0,
                'width' => $originalWidth,
                'height' => $originalHeight,
            ]);

            $imf = imagecreatetruecolor($newWidth, $newHeight);
            imagealphablending($imf, false);
            imagesavealpha($imf, true);

            imagecopyresampled($imf, $croppedImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

            $filePath = storage_path('app/public/upload/' . $imageName);

            $compressionLevel = 9;
            imagepng($imf, $filePath, $compressionLevel);
            imagedestroy($imageResource);
            imagedestroy($croppedImage);
            imagedestroy($imf);
        }
        catch (QueryException $exception) {
            Log::error('Can\'t upload image: ' . $exception->getMessage());
            return null;
        }

    }

    public function removeImage(string $imagePath)
    {
        Storage::disk('public')->delete($imagePath);
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
