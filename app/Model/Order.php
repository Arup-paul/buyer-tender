<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     public function products():\Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Orderdetail::class);
    }
}
