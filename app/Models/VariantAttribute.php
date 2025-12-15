<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttribute extends Model
{
  public $timestamps = false;

    protected $fillable = [
        'product_variant_id','attribute_id','attribute_value_id'
    ];

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class,'product_variant_id');
    }
}
