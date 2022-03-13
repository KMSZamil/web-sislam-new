<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    public function dealersGroup()
    {
        return $this->belongsTo('App\Models\ContactsGroup', 'group_id');
    }
}
