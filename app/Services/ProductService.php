<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductDetails($productId)
    {
        return $this->productRepository->getProductDetails($productId);
    }

    public function getFilteredProducts($filters, $perPage = 10)
    {
        return $this->productRepository->getFilteredProducts($filters, $perPage);
    }
} 