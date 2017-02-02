<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenUser extends Model
{
    

    protected $fillable = ['img', 'ruta', 'mime', 'original_img', 'user_id'];


    public function user()
    {

    	return $this->belongsTo('App\User');
    }

    public function hasImg($user)
	{

	return 	ImagenUser::where('user_id', $user)
            ->count();
	}
}
