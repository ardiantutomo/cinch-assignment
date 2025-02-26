<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'sku'];

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function rentalPeriods()
    {
        return $this->hasMany(ProductPricing::class);
    }

    public function pricing()
    {
        return $this->hasMany(ProductPricing::class);
    }
}
