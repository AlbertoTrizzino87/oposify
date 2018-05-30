<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Curso;
use App\Video;
use App\Tema;
use App\Test;
use App\Apunte;
use App\Http\Requests\CrearCursoRequest;
use App\Http\Requests\CrearVideoRequest;
use App\Http\Requests\CrearTemaRequest;
use App\Http\Requests\CrearTestRequest;
use App\Http\Requests\CrearApunteRequest;
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
        return redirect('/user');
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
        return redirect('/user');
    }

    public function tema(CrearTemaRequest $request)
    {   
        $id = Auth::user()->id;
        $tema = $request->file('tema');
        
        $temas = Tema::create([
            'user_id' => $id,
            'curso_id' => $request->input('oposicion'),
            'tema' => $tema->store('temas','public'),
            'titulo' => $request->input('titulo')
        ]);
        return redirect('/user');
    }

    public function test(CrearTestRequest $request)
    {   
        $id = Auth::user()->id;
        $test = $request->file('test');
        
        $tests = Test::create([
            'user_id' => $id,
            'curso_id' => $request->input('oposicion'),
            'test' => $test->store('tests','public'),
            'titulo' => $request->input('titulo')
        ]);
        return redirect('/user');
    }

    public function apunte(CrearApunteRequest $request)
    {   
        $id = Auth::user()->id;
        $apunte = $request->file('apuntes');
        
        $apuntes = Apunte::create([
            'user_id' => $id,
            'curso_id' => $request->input('oposicion'),
            'apuntes' => $apunte->store('apuntes','public'),
            'titulo' => $request->input('titulo')
        ]);
        return redirect('/user');
    }

    
}
