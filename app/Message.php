<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	//POR DEFECTO SE TOMA LA TABLA CON EL MISMO NOMBRE, PERO EN MINUSCULAS Y EN PLURAL
	//SI SE DESEA USAR UNA TABLA CON OTRO NOMBRE
    //protected $table = 'nombre_de_la_tabla';


	//lA SIGUIENTE PROPIEDAD PERMITE DESIGNAR LOS DATOS QUE ES PUEDEN INGRESAR DE FORMA MASIVA
    protected $fillable = ['nombre', 'email', 'mensaje'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function note()
    {
    	//RELACIONES POLIMORFICAS, COMO SEGUNDO PARAMETRO SE LLAMA A LA FUNCION DECLARADA EN EL MODELO NOTE
    	return $this->morphOne(Note::class, 'notable')->withTimestamps();
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
}
