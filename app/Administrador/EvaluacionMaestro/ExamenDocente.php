<?php

namespace App\Administrador\EvaluacionMaestro;

use Illuminate\Database\Eloquent\Model;

class ExamenDocente extends Model
{
    
    protected $fillable = [
    'name',
    'ciudad',
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
    	return $this->hasMany('App\Administrador\EvaluacionMaestro\PreguntaDocente');
    }

    public function resultadoDoc()
    {
        return $this->hasMany('App\Administrador\EvaluacionMaestro\ResultadoDocente');
    }
}
