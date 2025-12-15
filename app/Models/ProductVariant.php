<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
     protected $fillable = [
        'product_id','sku','price','sale_price','stock','status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attributes()
    {
        return $this->hasMany(VariantAttribute::class);
    }

    public function variantAttributes()
    {
        return $this->hasMany(VariantAttribute::class, 'product_variant_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
