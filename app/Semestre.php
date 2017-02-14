<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model {

	
	protected $fillable = ['name', 'carrera_id'];


	public function carrera()
	{
		return $this->belongsTo('App\Carrera');
	}

	public function materias()
	{
		return $this->hasMany('App\Materia');
	}

	public function users()
	{

		return $this->belongsToMany('App\User');
	}

	public function campuses()
	{
		return $this->belongsToMany('App\Campus');
	}

	public function getMateriaListAttribute()
	{

		return $this->materias->lists('id')->all();
	}

	public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('name', "LIKE", "%$name%");
        }
      
    }

}
