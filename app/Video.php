<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    
    protected $fillable = ['filename', 'mime', 'original_filename', 'ruta', 'unidad_id'];


	public function unidad(){

		return $this->belongsTo('App\Unidad');
	}

	public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('original_filename', "LIKE", "%$name%");
        }
      
    }
}
