<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    

    protected $fillable = [

    'materia', 
    'seriacion', 
    'clave', 
    'semestre', 
    'fecha',
     'objetivo', 
     'asesor', 
     'unidad', 
     'tema', 
     'actividadP',
     'materia_id',
     'user_id'

     ];


     public function materia()
	{

		return $this->belongsTo('App\Materia');
	}

    public function actividades()
    {

        return $this->hasMany('App\Actividad');
    }

	public function user()
	{

		return $this->belongsTo('App\User');
	}

    public function subtemas()
    {

        return $this->hasMany('App\Subtemas');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function getMateriaListAttribute()
	{

		return $this->materia->get('id');
	}
    
}
