<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    
    protected $fillable = ['name', 'estado', 'pregunta_id'];

    public function preguntas()
    {
    	return $this->belongsTo('App\Pregunta');
    }

    
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

}
