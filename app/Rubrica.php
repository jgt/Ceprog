<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubrica extends Model
{
    

    protected $fillable = ['name', 'descripcion', 'total', 'actividad_id'];


	public function actividad()

	{
		return $this->belongsTo('App\Actividad');
	}

	public function calificaciones()
	{

		return $this->belongsToMany('App\Calificacion')->withPivot('nota');
	}


	public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('name', "LIKE", "%$name%");
        }
      
    }

    public function hasCalificacion($id)
	{
		return $this->calificaciones()->where('rubrica_id', $id)->count();
	}

}
