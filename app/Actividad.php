<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    
    protected $fillable = [

		'estrategia',
		'cognoscitivo',
		'actividad',
		'descripcion',
		'valoractividad',
		'unidad',
		'evidencia',
		'caracteristicas',
		'realizacion',
		'fecha',
		'fechaF',
		'codigoactividad',
		'unidad_id',



	];

	
	 public function unidad()
	{

		return $this->belongsTo('App\Unidad');
	}


	public function calificaciones()
	{
		return $this->hasMany('App\Calificacion');
	}
	
	public function apoyos()
	{

		return $this->hasMany('App\Apoyo');
	}

	public function rubricas()
	{

		return $this->hasMany('App\Rubrica');
	}


	public function fileentries()
	{

		return $this->hasMany('App\Fileentry');
	}

	public function getRubricasListAttribute()
	{

		return $this->rubricas->lists('id')->all();
	}

	
	public function scopeFile($name)
	{
        if (trim($name) != "") {
            
              $this->fileentries()->where('original_filename', "LIKE", "%$name%");
        }
      
	}


	public function hasNota(User $user, $act){


		return $this->calificaciones()->where('user_id', $user->id)->where('actividad_id', $act->id)->get();
	}


	public function hasArchivo($act)
	{

		return $this->fileentries()->where('actividad_id', $act->id);
	}



}
