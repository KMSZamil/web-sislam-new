<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerCarImage extends Model
{
    use HasFactory;

    protected $table = 'seller_car_images';
    public $timestamps = false;
}
