<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected CategoryRepository $categoryRepository;

    public function __construct() {
        $this->categoryRepository = new CategoryRepository();
    }

    public function getAllCategories() {
        return $this->categoryRepository->getAllCategories();
    }

    public function getAllSubcategories() {
        return $this->categoryRepository->getAllSubcategories();
    }
}
