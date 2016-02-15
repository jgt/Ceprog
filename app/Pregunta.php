<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
   
	 
   	protected $fillable = ['contenido', 'distraptorUno', 'distraptorDos', 'distraptorTres', 'correcta', 'valor', 'examen_id'];


   	public function examen()
   	{

   		return $this->belongsTo('App\Examen');
   	}


   	public function respuestas()
   	{

   		return $this->hasMany('App\Respuesta');
   	}
}
