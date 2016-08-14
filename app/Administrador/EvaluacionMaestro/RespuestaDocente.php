<?php

namespace App\Administrador\EvaluacionMaestro;

use Illuminate\Database\Eloquent\Model;

class RespuestaDocente extends Model
{
    
    protected $fillable = ['pregunta_docente_id', 'posible_respuesta_id', 'user_id'];
    

    public function preguntaDocente()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionMaestro\PreguntaDocente');
    }

    public function posibleRespuesta()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionMaestro\PosibleRespuesta');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
