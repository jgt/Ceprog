<?php

namespace App\Administrador\EvaluacionMaestro;

use Illuminate\Database\Eloquent\Model;

class ResultadoDocente extends Model
{
    
     protected $fillable = ['resultado', 'examen_docente_id', 'user_id', 'materia_id'];
    

    public function examenDocente()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionMaestro\ExamenDocente');
    }

    public function materia()
    {
    	return $this->belongsTo('App\Materia');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
