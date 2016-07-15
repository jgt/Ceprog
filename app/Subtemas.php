<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtemas extends Model
{
    
    protected $fillable = ['subtemas', 'descripcion', 'unidad_id'];


    public function unidad()
    {

    	return $this->belongsTo('App\Unidad');
    }

    public function imagenes()
    {

    	return $this->hasMany('App\Imagenes', 'subtema_id', 'id');
    }


}
