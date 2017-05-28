<?php

namespace App\Administrador\EvaluacionDiagnostico;

use Illuminate\Database\Eloquent\Model;

class Evaposresp extends Model
{
    
    protected $fillable = ['name', 'estado', 'pregunta_diag_id'];


    public function pregunta()
    {
    	return $this->belongsTo('App\Administrador\EvaluacionDiagnostico\Evaposresp');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
}
