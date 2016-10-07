<?php

namespace App\Administrador\EvaluacionMaestro;

use Illuminate\Database\Eloquent\Model;

class PreguntaDocente extends Model
{
    
    protected $fillable = [ 'contador', 'contenido', 'opciones', 'rango_id', 'examen_docente_id'];


    public function examenDocente()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionMaestro\ExamenDocente');
    }

    public function rango()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionMaestro\Rango');
    }

    public function respuestasDocentes()
    {
    	return $this->hasMany('App\Administrador\EvaluacionMaestro\PosibleRespuesta');
    }

    public function getPregRangoAttribute()
    {
        return count($this->respuestasDocentes);
    }

}
