<?php

namespace App\Administrador\EvaluacionMaestro;

use Illuminate\Database\Eloquent\Model;

class Rango extends Model
{
    
     protected $fillable = ['name', 'menor', 'mayor'];
    

    public function preguntas()
    {
    	return $this->hasMany('App\Administrador\EvaluacionMaestro\PreguntaDocente');
    }

}
