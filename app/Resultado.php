<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    

    protected $fillable = ['resultado', 'examen_id', 'user_id'];



    public function examen()
    {

    	return $this->belongsTo('App\Examen');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
