<?php namespace App\Entitis;

use Illuminate\Database\Eloquent\Model;


class Entity extends Model {


 public function scopeName($query, $name)
   	 {
        if (trim($name) != "") {
            
              $query->where('name', "LIKE", "%$name%");
        }
      
    }

    

}