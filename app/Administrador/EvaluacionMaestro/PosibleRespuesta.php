<?php

namespace App\Administrador\EvaluacionMaestro;

use Illuminate\Database\Eloquent\Model;

class PosibleRespuesta extends Model
{
    
    protected $fillable = ['name', 'estado', 'valor', 'pregunta_docente_id'];

    public function preguntaDocente()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionMaestro\PreguntaDocente');
    }
}
