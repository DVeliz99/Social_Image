<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images'; //Vinculamos la tabla images al modelo


    //Relacion de uno a muchos 
    public function comments()
    {
        //Una imagen tiene muchos comentarios 
        return $this->hasMany('App\Models\Comment')->orderBy('id', 'desc'); //El metodo hasMany hace la relacion del imagen id con los registro de la tabla images usando el modelo  

    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like')->orderBy('id', 'desc'); //Uno a muchos =>una imagen tendra muchos likes 

    }


    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id'); //de muchos a uno 
        //muchas imagenes pueden tener un mismo usuario_id
    }
}
