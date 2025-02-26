<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ProductService;
use App\Repositories\ProductRepository;
use Mockery;

class ProductServiceTest extends TestCase
{
    protected $productService;
    protected $productRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productRepository = Mockery::mock(ProductRepository::class);
        $this->productService = new ProductService($this->productRepository);
    }

    public function testGetProductDetails()
    {
        $productId = 1;
        $expectedProduct = ['id' => $productId, 'name' => 'Test Product'];

        $this->productRepository
            ->shouldReceive('getProductDetails')
            ->with($productId)
            ->once()
            ->andReturn($expectedProduct);

        $product = $this->productService->getProductDetails($productId);

        $this->assertEquals($expectedProduct, $product);
    }

    public function testGetFilteredProducts()
    {
        $filters = ['region_id' => 1];
        $perPage = 10;
        $expectedProducts = ['data' => [['id' => 1, 'name' => 'Test Product']]];

        $this->productRepository
            ->shouldReceive('getFilteredProducts')
            ->with($filters, $perPage)
            ->once()
            ->andReturn($expectedProducts);

        $products = $this->productService->getFilteredProducts($filters, $perPage);

        $this->assertEquals($expectedProducts, $products);
    }
} 