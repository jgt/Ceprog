<?php

namespace App\Administrador\EvaluacionDiagnostico;

use Illuminate\Database\Eloquent\Model;

class Evadig extends Model
{
    
    protected $fillable = [

	'name',
    'modalidad', 
    'modulo',
    'fecha', 
    'fechaF'

	];
    

    public function carreras()
    {
    	return $this->belongsToMany('App\Carrera');
    }

    public function preguntas()
    {
        return $this->hasMany('App\Administrador\EvaluacionDiagnostico\PreguntaDiag');
    }

    public function resulDiag()
    {
        return $this->hasMany('App\Administrador\EvaluacionDiagnostico\ResultadoDiag');
    }
}
