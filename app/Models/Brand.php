<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'car_brand',
        'car_model',
//        'car_id',
    ];
    public function Car()
    {
        return $this->belongsTo(Car::class);
    }
}
