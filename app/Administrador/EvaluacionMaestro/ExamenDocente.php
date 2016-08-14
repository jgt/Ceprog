<?php

namespace App\Administrador\EvaluacionMaestro;

use Illuminate\Database\Eloquent\Model;

class ExamenDocente extends Model
{
    
    protected $fillable = [
    'name',
    'ciudad',
    'carrera', 
    'catedratico', 
    'modalidad', 
    'modulo',
    'fecha', 
    'fechaF', 
    'materia_id'
    ];

    public function materia()
    {
    	return $this->belongsTo('App\Materia');
    }

    public function preguntas()
    {
    	return $this->hasMany('App\Administrador\EvaluacionMaestro\PreguntaDocente');
    }
}
