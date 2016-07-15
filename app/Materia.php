<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model {

	
	protected $fillable = ['name', 'creditos', 'semestre_id'];



	public function videos()
	{

		return $this->hasMany('App\Video');
	}

	public function unidades()
	{

		return $this->hasMany('App\Unidad');
	}


	public function semestre()
	{
		return $this->belongsTo('App\Semestre');
	}

	
	public function actividades()
	{

		return $this->hasMany('App\Actividad');
	}

	public function users()
	{

		return $this->belongsToMany('App\User');
	}

	public function planeaciones()
	{
		return $this->hasMany('App\Planeacion');
	}

	public function examenes()
	{
		return $this->hasMany('App\Examen');
	}


	public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('name', "LIKE", "%$name%");
        }
      
    }

    public function foros()
    {

    	return $this->hasMany('App\Foro');
    }

}
