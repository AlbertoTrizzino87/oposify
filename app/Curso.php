<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
