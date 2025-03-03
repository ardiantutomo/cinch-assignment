<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getProductDetails($productId)
    {
        return Product::with([
            'attributes.attributeValues.attribute',
            'attributes.attributeValues.attribute.pricings',
            'pricings.rentalPeriod',
            'pricings.region'
        ])->find($productId);
    }

    public function getFilteredProducts($filters, $perPage = 10)
    {
        $query = Product::with([
            'attributes.attributeValues.attribute',
            'attributes.attributeValues.attribute.pricings',
            'pricings.rentalPeriod',
            'pricings.region'
        ]);

        if (isset($filters['region_id'])) {
            $query->whereHas('pricings.region', function ($q) use ($filters) {
                $q->where('id', $filters['region_id']);
            });
        }

        if (isset($filters['rental_period_id'])) {
            $query->whereHas('pricings.rentalPeriod', function ($q) use ($filters) {
                $q->where('id', $filters['rental_period_id']);
            });
        }

        $products = $query->paginate($perPage);

        $products->getCollection()->transform(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'sku' => $product->sku,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'attributes' => $product->attributes->map(function ($attribute) {
                    return [
                        'id' => $attribute->id,
                        'pricing' => $attribute->attributeValues->attribute->pricings->map(function ($pricing) {
                            return [
                                'price' => $pricing->price,
                                'rental_period_months' => $pricing->rentalPeriod->months,
                                'region_name' => $pricing->region->name,
                            ];
                        }),
                        'value' => $attribute->attributeValues->value,
                        'name' => $attribute->attributeValues->attribute->name,
                    ];
                }),
                'pricing' => $product->pricings->map(function ($pricing) {
                    return [
                        'price' => $pricing->price,
                        'rental_period_months' => $pricing->rentalPeriod->months,
                        'region_name' => $pricing->region->name,
                    ];
                }),
            ];
        });

        return $products;
    }
} 