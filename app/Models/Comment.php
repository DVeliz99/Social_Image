<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    //Relacion de muchos a uno 

    //muchos comentarios pueden pertenecen a un solo usuario 

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');

        //Relacion de muchos a uno 

    }
    public function image()
    {
        return $this->belongsTo('App\Models\Image', 'image_id');
    }
}
