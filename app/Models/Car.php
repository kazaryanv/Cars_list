<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'car_brand',
        'car_model',
        'car_years',
        'car_Engine_capacity',
        'car_Transmission',
        'post_id'
    ];

    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}
