<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'p_name', 'p_price','p_qty','p_image'
    ];
}
