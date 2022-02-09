<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerImage extends Model
{
    use HasFactory;

    protected $table = 'seller_images';
    public $timestamps = false;
}
