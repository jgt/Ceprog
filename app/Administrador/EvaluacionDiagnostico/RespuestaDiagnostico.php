<?php

namespace App\Administrador\EvaluacionDiagnostico;

use Illuminate\Database\Eloquent\Model;

class RespuestaDiagnostico extends Model
{
    

    protected $fillable = ['pregunta_diag_id', 'evaposresp_id', 'user_id'];

    public function pregunta()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionDiagnostico\PreguntaDiag');
    }

    public function respuesta()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionDiagnostico\Evaposresp');
    }
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
