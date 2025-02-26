<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;
use App\Models\Attribute;

class AttributeValueSeeder extends Seeder
{
    public function run()
    {
        $attributes = Attribute::all();

        $attributeValues = [
            'Color' => ['Red', 'Blue', 'Green'],
            'Size' => ['Small', 'Medium', 'Large'],
        ];

        foreach ($attributes as $attribute) {
            if (isset($attributeValues[$attribute->name])) {
                foreach ($attributeValues[$attribute->name] as $value) {
                    AttributeValue::create([
                        'attribute_id' => $attribute->id,
                        'value' => $value,
                    ]);
                }
            }
        }
    }
} 