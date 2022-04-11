<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    /* public function comments()
    {
        return $this->belongsToMany('App\Models\Post', 'comments');
    } */
    public function comments()
    {
        return $this->belongsTo(related:Post::class);
    }

}
