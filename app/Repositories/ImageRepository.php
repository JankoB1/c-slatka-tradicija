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

    public function saveMaskImage($image, $xOffset, $imageName, $recipe_id) {
        $imageData = $image;
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = base64_decode($imageData);
        $imageResource = imagecreatefromstring($imageData);

        $originalWidth = imagesx($imageResource);
        $originalHeight = imagesy($imageResource);

        // Calculate the new dimensions while preserving the aspect ratio
        $aspectRatio = $originalWidth / $originalHeight;
        $newWidth = 1920;
        $newHeight = $newWidth / $aspectRatio;

// Adjust the crop dimensions
        $croppedImage = imagecrop($imageResource, [
            'x' => $xOffset,
            'y' => 0,
            'width' => $originalWidth, // Use the full width for cropping
            'height' => $originalHeight, // Use the full height for cropping
        ]);

// Create a new image with the desired dimensions
        $imf = imagecreatetruecolor($newWidth, $newHeight);
        imagealphablending($imf, false);
        imagesavealpha($imf, true);

// Resample and copy the cropped image to the new image, preserving the aspect ratio
        imagecopyresampled($imf, $croppedImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        $filePath = storage_path('app/public/upload/' . $imageName);

        $compressionLevel = 9;
        imagepng($imf, $filePath, $compressionLevel);
        imagedestroy($imageResource);
        imagedestroy($croppedImage);
        imagedestroy($imf);

        $this->addImage($imageName, $recipe_id);
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
