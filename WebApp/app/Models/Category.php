<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    /* public function category()
    {
        return $this->belongsToMany('App\Models\User', 'user_category');
    } */

    public function categories()
    {
        return $this->belongsTo(related:Post::class);
    }

}
