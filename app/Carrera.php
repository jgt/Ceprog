<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {

	
	protected $fillable = ['name', 'plan', 'revoe'];

	
	public function users()
	{
		return $this->belongsToMany('App\User');
	}

	public function examenesDocente()
	{
		return $this->belongsToMany('App\Administrador\EvaluacionMaestro\ExamenDocente');
	}

	public function semestres()
	{

		return $this->hasMany('App\Semestre')->orderBy('created_at','ASC');
	}

	
	public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('name', "LIKE", "%$name%");
        }
      
    }

    public function foros()
    {

    	return $this->belongsToMany('App\Foro');
    }

}
