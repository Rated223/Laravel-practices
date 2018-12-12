<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = ['body'];
    
    public function notable()
    {
    	//RELACIONES POLIMORFICAS, NO SE PASA NINGUNA CLASE A LA FUNCION moprhTo
    	return $this->morphTo();
    }
}
