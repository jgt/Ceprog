<?php

namespace App\Administrador\EvaluacionDiagnostico;

use Illuminate\Database\Eloquent\Model;

class ResultadoDiag extends Model
{
    
    protected $fillable = ['resultado', 'evadig_id', 'user_id'];
    

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function exa()
    {
        return $this->belongsTo('App\Administrador\EvaluacionDiagnostico\Evadig', 'evadig_id');
    }
}
