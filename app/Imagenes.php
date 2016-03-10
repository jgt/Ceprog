<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    

    protected $fillable = ['filename', 'mime', 'original_filename', 'ruta', 'subtema_id'];


    public function subtema()
    {

    	return $this->belongsTo('App\Subtemas');
    }
}
