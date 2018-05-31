<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function userEntrada()
    {
        return $this->belongsTo(User::class);
    }
}
