<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCondition extends Model
{
    use HasFactory;

    protected $table = 'car_condition';
    public $timestamps = false;
}
