<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller_fuel_type extends Model
{
    use HasFactory;
    protected $table = 'seller_fuel_type';
    public $timestamps = false;

    public function fuel_type_name(){
        return $this->belongsTo(FuelType::class,'fuel_type_id','id');
    }
}
