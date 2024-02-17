<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected ProductRepository $productRepository;

    public function __construct() {
        $this->productRepository = new ProductRepository();
    }

    public function getAllProductsByCategory(int $product_category_id) {
        return $this->productRepository->getAllProductsByCategory($product_category_id);
    }

    public function getAllProducts() {
        return $this->productRepository->getAllProducts();
    }
}
