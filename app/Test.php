<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded = [];

    public function usertest()
    {
        return $this->belongsTo(User::class);
    }

    public function cursostest()
    {
        return $this->belongsTo(Curso::class);
    }
}
