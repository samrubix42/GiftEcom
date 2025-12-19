<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'email',
        'phone',
        'message',
    ];
}
