<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planeacion extends Model
{
    

    protected $fillable = ['filename', 'mime', 'original_filename', 'materia_id', 'user_id'];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function materia()
    {
    	return $this->belongsTo('App\Materia');
    }

    public function hasArchivo($id, $user)
	{

	return 	Planeacion::where('materia_id', $id)
    		->where('user_id', $user)
            ->count();
	}
}
