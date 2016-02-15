<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model {

	

	protected $fillable = ['title', 'materia_id'];


	
	public function comentarios()
	{

		return $this->hasMany('App\Comentario');
	}


	public function materia()
	{

		return $this->belongsTo('App\Materia');
	}


	public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('title', "LIKE", "%$name%");
        }
      
    }

}
