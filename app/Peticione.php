<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peticione extends Model
{
    protected $guarded = [];

    public function usersPeticiones()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
