<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable = [
        'name', 'mobile_no','email','address','status','created_by','updated_by',
    ];
}
