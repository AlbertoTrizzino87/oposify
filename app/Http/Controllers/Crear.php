<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Curso;
use App\Http\Requests\CrearCursoRequest;
use App\Oposicione;

class Crear extends Controller
{
    public function curso(CrearCursoRequest $request){
        $cursos = Curso::create([
            'preparador' => $request->input('preparador'),
            'oposicion' => $request->input('oposicion'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio')
        ]);
        return 'Todo ha ido bien';
    }
}
