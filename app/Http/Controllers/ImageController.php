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
        return $request->file('image')->store('upload', 'public');
    }

    public function addImage(Request $request)
    {
        $this->imageService->saveMaskImage($request);
    }
}
