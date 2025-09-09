<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
     protected $fillable = [
        'name',
        'lastname',
        'phone'
    ];



    // App\Models\Client.php
public function cars()
{
    return $this->hasMany(Car::class);
}




}
