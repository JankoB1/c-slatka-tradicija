<?php

namespace App\Services;

use App\Repositories\ImageRepository;

class ImageService
{

    protected ImageRepository $imageRepository;
    public function __construct()
    {
        $this->imageRepository = new ImageRepository();
    }

    public function addImage($path, $recipe_id) {
        return $this->imageRepository->addImage($path, $recipe_id);
    }
}
