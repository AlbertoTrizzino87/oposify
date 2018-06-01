<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesore extends Model
{
    protected $guarded = [];

    public function academia()
    {
        return $this->belongsTo(User::class,'id_academia');
    }

    public function preparador()
    {
        return $this->belongsTo(User::class,'id_preparador');
    }
}
