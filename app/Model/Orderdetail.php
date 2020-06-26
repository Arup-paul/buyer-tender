<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
     public function product():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
