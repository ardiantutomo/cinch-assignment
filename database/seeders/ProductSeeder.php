<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use App\Models\ProductPricing;
use App\Models\RentalPeriod;
use App\Models\Region;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = collect([
            Product::create(['name' => 'Product 1', 'description' => 'Description for product 1', 'sku' => 'SKU-0001']),
            Product::create(['name' => 'Product 2', 'description' => 'Description for product 2', 'sku' => 'SKU-0002']),
            Product::create(['name' => 'Product 3', 'description' => 'Description for product 3', 'sku' => 'SKU-0003']),
            Product::create(['name' => 'Product 4', 'description' => 'Description for product 4', 'sku' => 'SKU-0004']),
            Product::create(['name' => 'Product 5', 'description' => 'Description for product 5', 'sku' => 'SKU-0005']),
        ]);

        $attributeValues = AttributeValue::all();

        $rentalPeriods = RentalPeriod::all();
        $regions = Region::all();

        foreach ($products as $product) {
            foreach ($attributeValues as $attributeValue) {
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'attribute_value_id' => $attributeValue->id,
                ]);
            }

            foreach ($rentalPeriods as $rentalPeriod) {
                foreach ($regions as $region) {
                    ProductPricing::create([
                        'product_id' => $product->id,
                        'rental_period_id' => $rentalPeriod->id,
                        'region_id' => $region->id,
                        'price' => rand(100, 1000),
                    ]);
                }
            }
        }
    }
}
