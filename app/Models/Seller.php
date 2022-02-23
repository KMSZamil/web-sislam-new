<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $table = 'seller';

    public function images(){
        return $this->hasMany(SellerImage::class,'seller_id','id');
    }

    public function car_images(){
        return $this->hasMany(SellerCarImage::class,'seller_id','id');
    }

    public function seller_fuel_types(){
        return $this->hasMany(Seller_fuel_type::class,'seller_id','id');
    }

    public function seller_comfort(){
        return $this->hasMany(Seller_Comfort::class,'seller_id','id');
    }

    public function seller_entertainment(){
        return $this->hasMany(Seller_Entertainment::class,'seller_id','id');
    }

    public function seller_safety(){
        return $this->hasMany(Seller_Safety::class,'seller_id','id');
    }

    public function seller_seat(){
        return $this->hasMany(Seller_Seat::class,'seller_id','id');
    }

    public function seller_window(){
        return $this->hasMany(Seller_Window::class,'seller_id','id');
    }

    public function seller_other_feature(){
        return $this->hasMany(Seller_Other_Feature::class,'seller_id','id');
    }

    public function condition(){
        return $this->belongsTo(CarCondition::class,'car_condition','id');
    }

    public function car_brand(){
        return $this->belongsTo(CarBrand::class,'brand','id');
    }

    public function model(){
        return $this->belongsTo(CarModel::class,'car_model','id');
    }

    public function bodytype(){
        return $this->belongsTo(BodyType::class,'body_type','id');
    }

    public function car_exterior_color(){
        return $this->belongsTo(ExteriorColor::class,'exterior_color','id');
    }

    public function drive_type(){
        return $this->hasOne(Drive::class,'id','drive_type');
    }

    public function car_transmission(){
        return $this->hasOne(Transmission::class,'id','transmission');
    }

    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    
    
    public function seller_car_images(){
        return $this->hasMany(SellerCarImage::class,'seller_id','id');
    }

    
}
