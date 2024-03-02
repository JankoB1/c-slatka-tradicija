<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class ImageService
{

    protected ImageRepository $imageRepository;
    public function __construct()
    {
        $this->imageRepository = new ImageRepository();
    }

    public function saveMaskImage(Request $request) {
        $this->imageRepository->saveMaskImage(
            $request->imageData,
            $request->xOffset,
            $request->imageName,
            1);
    }

    public function removeImage(Request $request) {
        foreach($request->input('imagesToDelete') as $image) {
            $this->imageRepository->removeImage($image);
        }
    }
}
