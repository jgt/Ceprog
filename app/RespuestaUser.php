<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaUser extends Model
{
    

    protected $table = 'respuesta_users';

    protected $fillable = ['pregunta_id', 'respuesta_id', 'user_id'];

    public function pregunta()
    {
    	return $this->belongsTo('App\Pregunta');
    }

    public function respuesta()
    {
    	return $this->belongsTo('App\Respuesta');
    }
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
