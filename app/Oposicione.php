<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oposicione extends Model
{
    public function cursosOpo()
    {
        return $this->hasMany(Curso::class)->orderBy('descripcion','asc');
    }
}
