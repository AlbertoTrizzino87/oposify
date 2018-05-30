<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Curso extends Model
{   
    use Searchable;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function oposicione()
    {
        return $this->belongsTo(Oposicione::class);
    }

    public function videocurso()
    {
        return $this->hasMany(Video::class);
    }

    public function apuntecurso()
    {
        return $this->hasMany(Apunte::class);
    }

    public function temacurso()
    {
        return $this->hasMany(Tema::class);
    }

    public function testcurso()
    {
        return $this->hasMany(Test::class);
    }

    public function toSearchableArray()
    {
        $this->load('user')->load('oposicione');
        return $this->toArray();
    }
}
