<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Curso;
use App\Video;
use App\Http\Requests\CrearCursoRequest;
use App\Http\Requests\CrearVideoRequest;
use App\Oposicione;

class Crear extends Controller
{
    public function curso(CrearCursoRequest $request){
        $cursos = Curso::create([
            'user_id' => $request->input('preparador'),
            'oposicione_id' => $request->input('oposicion'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio')
        ]);
        return 'Todo ha ido bien';
    }

    public function video(CrearVideoRequest $request)
    {   
        $id = Auth::user()->id;
        $video = $request->file('video');
        
        $videos = Video::create([
            'user_id' => $id,
            'curso_id' => $request->input('oposicion'),
            'video' => $video->store('videos','public'),
            'titulo' => $request->input('titulo')
        ]);
        return 'Todo ha ido bien';
    }
}
