<?php

namespace App\Administrador\EvaluacionDiagnostico;

use Illuminate\Database\Eloquent\Model;

class PreguntaDiag extends Model
{
    
     protected $fillable = ['contador', 'contenido', 'valor', 'imagen', 'evadig_id', 'area_id'];


    public function examen()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionDiagnostico\Evadig');
    }

     public function area()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionDiagnostico\Area');
    }

    public function posibleResp()
    {
    	return $this->hasMany('App\Administrador\EvaluacionDiagnostico\Evaposresp');
    }
    
}
