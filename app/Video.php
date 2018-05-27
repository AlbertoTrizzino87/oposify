<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    public function uservideo()
    {
        return $this->belongsTo(User::class);
    }

    public function cursosvideo()
    {
        return $this->belongsTo(Curso::class);
    }
}
