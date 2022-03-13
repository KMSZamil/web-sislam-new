<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherFeature extends Model
{
    use HasFactory;
    protected $table = 'other_feature';
    public $timestamps = false;
}
