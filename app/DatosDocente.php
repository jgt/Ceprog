<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosDocente extends Model
{
    
    protected $fillable = ['formacion', 'celular', 'antiguedad', 'curriculum', 'modelo', 'contrato', 'entrevista', 'identidad', 'planeacion', 'erom', 'apa', 'user_id'];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function campuses()
    {
    	return $this->belongsToMany('App\Campus');
    }

    public function seguimiento()
    {
    	return $this->hasMany('App\Seguimiento');
    }

}
