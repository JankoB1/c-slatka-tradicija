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
        $image_path = $request->file('image')->store('upload', 'public');
        return $image_path;
    }

    public function addImage(Request $request)
    {
        $this->imageService->saveMaskImage($request);
    }
}
