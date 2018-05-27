<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
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

    public function temacurso()
    {
        return $this->hasMany(Tema::class);
    }

    public function testcurso()
    {
        return $this->hasMany(Test::class);
    }
}
