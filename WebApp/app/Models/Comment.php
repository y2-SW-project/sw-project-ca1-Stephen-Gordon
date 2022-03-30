<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    public function comment()
    {
        return $this->belongsToMany('App\Models\Post', 'comment');
    }

}
