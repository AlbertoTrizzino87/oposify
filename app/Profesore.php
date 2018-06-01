<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesore extends Model
{
    protected $guarded = [];

    public function academia()
    {
        $this->belongsTo(User::class,'id_academia');
    }

    public function preparador()
    {
        $this->belongsTo(User::class,'id_preparador');
    }
}
