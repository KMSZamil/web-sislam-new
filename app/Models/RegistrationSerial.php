<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationSerial extends Model
{
    use HasFactory;

    
    protected $table = 'registration_serial';
    public $timestamps = false;
}
