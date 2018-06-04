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
use App\Blog;
use App\Mail;
use Session;
use App\Http\Requests\CrearCursoRequest;
use App\Http\Requests\CrearVideoRequest;
use App\Http\Requests\CrearTemaRequest;
use App\Http\Requests\CrearTestRequest;
use App\Http\Requests\CrearApunteRequest;
use App\Http\Requests\CrearEntradaRequest;
use App\Oposicione;

class Crear extends Controller
{   
    public function leerEntrada(Request $request)
    {
        $id = $request->input("id");
        $element = Blog::where('id',$id)->get();

        return response()->json([
            'mensaje'=>'Curso creado',
            'element'=>$element
        ]);
    }

    public function leer(Request $request)
    {   
        $id = $request->input("id");
        $element = Mail::where('id',$id)->get();

        return response()->json([
            'mensaje'=>'Curso creado',
            'element'=>$element
        ]);
    }

    public function curso(CrearCursoRequest $request){
        $id = Auth::user()->id;
        
        $cursos = Curso::create([
            'user_id' => $request->input('dueno'),
            'oposicione_id' => $request->input('oposicion'),
            'preparador_id' => $id,
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio')
        ]);

        $element = Curso::where('preparador_id',$id)->get();
        $element->load('oposicione');
        return response()->json([
            'mensaje'=>'Curso creado',
            'element'=>$element
        ]);
    }

    public function eliminarcurso(Request $request)
    {   
        $id = $request->input('id');
        Curso::destroy($id);
        return response()->json([
            'mensaje'=>'Curso eliminado',
            
        ]);
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

        $videoSubido = 1;
        $session = Session::flash('videoSubido', $videoSubido);
        return redirect()->back();
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
        $temaSubido = 1;
        $session = Session::flash('temaSubido', $temaSubido);
        return redirect()->back();
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
        $testSubido = 1;
        $session = Session::flash('testSubido', $testSubido);
        return redirect()->back();
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

    public function entrada(CrearEntradaRequest $request)
    {   
        $id = Auth::user()->id;
        $portada = $request->file('portada');
        
        $portadas = Blog::create([
            'user_id' => $id,
            'contenido' => $request->input('contenido'),
            'portada' => $portada->store('portadas','public'),
            'titulo' => $request->input('titulo')
        ]);
        return redirect('/user');
    }
    
}
