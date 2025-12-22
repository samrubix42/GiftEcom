<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $fillable = [
        'name','slug','description','has_variants','status','is_featured','category_id','brand_id','long_description','additional_information',
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_featured' => 'boolean',
        'has_variants' => 'boolean',
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Default variant for simple product
    public function defaultVariant()
    {
        return $this->hasOne(ProductVariant::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
