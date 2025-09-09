<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{


    protected $fillable   = [
        'name',
        'client_id',
        'brand_id',
        'transmission',
        'year',
        'cubical',
        'power',
        
    ];


    public function brand()
{
    return $this->belongsTo(Brand::class, 'brand_id');
}
}
