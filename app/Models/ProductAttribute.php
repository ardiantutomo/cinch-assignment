<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Pivot
{

    protected $table = 'product_attributes';

    protected $fillable = ['product_id', 'attribute_value_id'];

    public function attributeValues()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }
}

