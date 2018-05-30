<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apunte extends Model
{
    protected $guarded = [];

    public function userapunte()
    {
        return $this->belongsTo(User::class);
    }

    public function cursosapunte()
    {
        return $this->belongsTo(Curso::class);
    }
}
