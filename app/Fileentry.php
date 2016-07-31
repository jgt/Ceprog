<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model
{
    

    protected $fillable = [ 'usuario', 'mensaje', 'filename', 'mime', 'original_filename', 'actividad_id', 'user_id'];
    
	public function actividad()
	{
		return $this->belongsTo('App\Actividad');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function calificaciones()
	{
		return $this->hasMany('App\Calificacion');
	}

	public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('original_filename', "LIKE", "%$name%");
        }
      
    }
}
