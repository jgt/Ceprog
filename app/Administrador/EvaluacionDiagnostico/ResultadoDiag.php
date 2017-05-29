<?php

namespace App\Administrador\EvaluacionDiagnostico;

use Illuminate\Database\Eloquent\Model;

class ResultadoDiag extends Model
{
    
    protected $fillable = ['resultado', 'evadig_id', 'user_id', 'carrera_id'];
    

    public function examenDocente()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionDiagnostico\Evadig');
    }

    public function carrera()
    {
    	return $this->belongsTo('App\Carrera');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
