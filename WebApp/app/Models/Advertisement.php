<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;


    public function advertisement()
    {
        return $this->belongsToMany('App\Models\Advertisement', 'user_advertisement');

    }

}
