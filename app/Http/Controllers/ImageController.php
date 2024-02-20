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

    public function addImage(Request $request)
    {
        $image = $request->image;
        Storage::append("public_path() . /recipe_images/image", $image);
        $recipe_id = $request->recipe_id;
        return $this->imageService->addImage($image, $recipe_id);
    }
}
