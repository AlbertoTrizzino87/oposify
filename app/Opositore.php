<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opositore extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function profesor()
    {
        return $this->belongsTo(User::class,'preparador_id');
    }
}
