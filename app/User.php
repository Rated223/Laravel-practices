<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Message;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function roles() {
        //SE AGREGAN LOS DATOS DE LOS ROLES ASIGNADOS AL USUARIO AL CONJUNTO DE DATOS DEL OBJETO USER, COMO UN ARRAY
        return $this->belongsToMany(Role::class, 'assigned_roles')->withTimestamps();
    }

    public function hasRoles(array $roles) {
        return $this->roles->pluck('name')->intersect($roles)->count();
    }
    public function isAdmin() {
        return $this->hasRoles(['admin']);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function note()
    {
        //RELACIONES POLIMORFICAS, COMO SEGUNDO PARAMETRO SE LLAMA A LA FUNCION DECLARADA EN EL MODELO NOTE
        return $this->morphOne(Note::class, 'notable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
