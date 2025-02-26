<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show($id)
    {
        $productDetails = $this->productService->getProductDetails($id);

        if (!$productDetails) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($productDetails);
    }

    public function index(Request $request)
    {
        $filters = $request->only(['region_id', 'rental_period_id']);
        $perPage = $request->get('per_page', 10);

        $products = $this->productService->getFilteredProducts($filters, $perPage);

        return response()->json($products);
    }
}
