<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    public function post()
    {
        return $this->belongsToMany('App\Models\User', 'user_post');
        
    }

}
