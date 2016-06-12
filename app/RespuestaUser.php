<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaUser extends Model
{
    

    protected $table = 'respuesta_users';

    protected $fillable = ['pregunta_id', 'respuesta_id', 'user_id'];

    public function preguntas()
    {
    	return $this->belongsTo('App\Pregunta');
    }

    public function respuestas()
    {
    	return $this->belongsTo('App\Respuesta');
    }
    
    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
