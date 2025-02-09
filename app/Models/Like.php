<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes'; //Vinculamos la tabla likes al modelo


    public function user()
    {
        //muchos likes pueden pertenecer a solo un usuario
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function image()
    {
        //muchos likes pueden pertenecer a una sola imagen
        return $this->belongsTo('App\Models\Image', 'image_id');
    }
}
