<?php

namespace App\Administrador\EvaluacionDiagnostico;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    
    protected $fillable = ['name', 'menor', 'mayor'];
    

    public function preguntas()
    {
    	return $this->hasMany('App\Administrador\EvaluacionDiagnostico\PreguntaDiag');
    }
}
