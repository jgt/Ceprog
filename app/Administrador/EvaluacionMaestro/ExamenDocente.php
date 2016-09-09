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

    public function materias()
    {
    	return $this->belongsToMany('App\Materia');
    }

    public function preguntas()
    {
    	return $this->hasMany('App\Administrador\EvaluacionMaestro\PreguntaDocente');
    }
}
