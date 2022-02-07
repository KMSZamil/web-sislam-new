<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExteriorColor extends Model
{
    use HasFactory;
    protected $table = 'exterior_color';
    public $timestamps = false;
}
