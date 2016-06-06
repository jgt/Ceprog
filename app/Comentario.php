<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    
    protected $fillable = ['comment'];

	public function users()
	{

		return	$this->belongsTo('App\User', 'user_id');
	}

	public function foros()
	{

		return $this->belongsTo('App\Foro');

	}

	 public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('link', "LIKE", "%$name%");
        }
      
    }
}
