<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController
{

    protected ImageService $imageService;
    function __construct()
    {
        $this->imageService = new ImageService();
    }

    public function uploadImage(Request $request)
    {
        $image = $request->file('image');
        $image_path = $request->file('image')->store('images', 'public');
        return Storage::append("public_path() . /recipe_images/image", $image);
        $recipe_id = $request->recipe_id;
        return $this->imageService->addImage($image, $recipe_id);
    }
}
