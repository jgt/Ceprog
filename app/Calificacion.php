<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    
    protected $fillable = ['promedio', 'comentario', 'user_id', 'actividad_id'];


	public function user()
	{
		return $this->belongsTo('App\User');
	}


	public function actividad()
	{
		return $this->belongsTo('App\Actividad');
	}

	public function rubricas()
	{

		return $this->belongsToMany('App\Rubrica')->withPivot('nota');
	}
}
