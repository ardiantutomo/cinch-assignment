<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductAttribute extends Pivot
{
    protected $table = 'product_attributes';

    protected $fillable = ['product_id', 'attribute_value_id'];
}

