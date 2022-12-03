<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'car_brand',
        'car_model',
        'car_years',
        'car_Engine_capacity',
        'car_Transmission',
        'content',
        'user_id',
    ];

    public function CarList()
    {
        return $this->belongsTo(Car::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
