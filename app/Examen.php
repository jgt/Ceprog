<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    
    protected $table = 'examenes';


    protected $fillable = ['modalidad', 'modulo', 'catedratico', 'fecha', 'fechaF', 'hora', 'materia_id'];



    public function materia()
    {

    	return $this->belongsTo('App\Materia');
    }

    public function preguntas()
    {

    	return $this->hasMany('App\Pregunta');
    }

    public function resultados()
    {

        return $this->hasMany('App\Resultado');
    }

    public function hasResultado(User $user, $exa){


        return $this->resultados()->where('user_id', $user->id)->where('examen_id', $exa->id)->count();
    }
}
