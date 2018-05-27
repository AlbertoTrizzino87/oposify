<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $guarded = [];

    public function usertema()
    {
        return $this->belongsTo(User::class);
    }

    public function cursostema()
    {
        return $this->belongsTo(Curso::class);
    }
}
