<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role','name','apellido','apellidoDos','email','direccion','image','telefono','ciudad', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cursos()
    {
        return $this->hasMany(Curso::class)->orderBy('descripcion','asc');
    }

    public function videos()
    {
        return $this->hasMany(Video::class)->orderBy('created_at','desc');
    }

    public function temas()
    {
        return $this->hasMany(Tema::class)->orderBy('created_at','desc');
    }

    public function tests()
    {
        return $this->hasMany(Test::class)->orderBy('created_at','desc');
    }

    public function apuntes()
    {
        return $this->hasMany(Apunte::class)->orderBy('created_at','desc');
    }

    public function entradas()
    {
        return $this->hasMany(Blog::class)->orderBy('created_at','desc');
    }
}
