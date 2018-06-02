<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Oposicione;
use App\Curso;
use App\Video;
use App\Tema;
use App\Test;
use App\Opositore;
use App\Apunte;
use App\Blog;
use App\Peticione;
use App\Profesore;
use App\Mail;


class PagesController extends Controller
{
    
    public function usuario(Request $request)
    {   
        $id = Auth::user()->id;
        $userRole = Auth::user()->role;
        $image = Auth::user()->image;
        $oposiciones = Oposicione::orderBy('descripcion', 'ASC')->get();
        $cursos = Curso::all();
        $user = Auth::user();
        $oposiciones = Oposicione::all();
        $cursoAcademia = Curso::where('user_id',$id)->get();
        $cursos_id = Curso::where('preparador_id',$id)->get();
        $videos = Video::where('user_id',$id)->get();
        $apuntes = Apunte::where('user_id',$id)->get();
        $videOpositor = Video::all();
        $entradas = Blog::where('user_id',$id)->get();
        $temas = Tema::where('user_id',$id)->get();
        $tests = Test::where('user_id',$id)->get();
        $opositorId = Opositore::where('user_id',$id)->get();
        $temasOpositor = Tema::all();
        $testsOpositor = Test::all();
        $parametro = $request->input('parametro');
        $enviar = $request->input('buscar');
        $enviar2 = $request->input('buscar2');
        if(isset($enviar)){
            $resultados = Curso::search($parametro)->get();      
        }else{
            $resultados = [];
        }

        if(isset($enviar2)){
            $resultadosPreparador = \App\User::search($parametro)->where('role_id', 2)->get();     
        }else{
            $resultadosPreparador = [];
        }
        
        $notificaciones = Peticione::where('id_user_2',$id)->get();
        $profesorado = Profesore::where('id_academia',$id)->get();
        $academias = Profesore::where('id_preparador',$id)->get();
        $alumnos= Opositore::where('preparador_id',$id)->get();
        $alumnosPreparador = Opositore::all();
        $misCursos = Opositore::where('user_id',$id)->get();
        $mensajesPersonales = Mail::where('reference_id',$id)->get();        

        if($userRole == 'Academia'){

            $title = 'Academia';

            $main = 'academia';

            $title_home = [
                'uno' => 'bienvenid@!',
                'dos' => 'Mensajes',
                'tres' => 'Profesorado',
                'cuatro' => 'Cursos',
                'cinco' => 'Notificaciones',
            ];

            return view('user',[
            
                'title' => $title,
                'main' => $main,
                'title_home' => $title_home,
                'resultadoPreparadores' => $resultadosPreparador,
                'profesores' => $profesorado,
                'cursosAcademia'=>$cursoAcademia,
                'alumnos'=> $alumnos,
                'mensajesPersonales' => $mensajesPersonales
            ]);
        }else if($userRole == 'Preparador'){

            $title = 'Preparador';

            $main = 'preparador';

            $title_home = [
                'uno' => 'bienvenid@!',
                'dos' => 'Mensajes',
                'tres' => 'Tareas pendientes',
                'cuatro' => 'Cursos',
                'cinco' => 'Notificaciones',
            ];

            // dd($cursos_id);

            return view('preparador',[
                'title' => $title,
                'main' => $main,
                'title_home' => $title_home,
                'oposiciones' => $oposiciones,
                'cursos' => $cursos,
                'user' => $user,
                'oposiciones' => $oposiciones,
                'cursosid' => $cursos_id,
                'videos' => $videos,
                'temas' => $temas,
                'tests' => $tests,
                'notificaciones' => $notificaciones,
                'academias' =>$academias,
                'cursos_id' =>$cursos_id,
                'alumnosPreparador' => $alumnosPreparador,
                'mensajesPersonales' => $mensajesPersonales
            ]);

        }else if($userRole == 'Opositor'){

            $title = 'Opositor';

            $main = 'opositor';

            $title_home = [
                'uno' => 'bienvenid@!',
                'dos' => 'Mensajes',
                'tres' => 'Tareas pendientes',
                'cuatro' => 'Estadisticas',
                'cinco' => 'Repaso',
            ];

            return view('opositor',[
                'title' => $title,
                'main' => $main,
                'title_home' => $title_home,
                'image' => $image,
                'resultados' => $resultados,
                'opositorId' => $opositorId,
                'cursos' => $cursos,
                'videos' =>  $videOpositor,
                'temas' => $temasOpositor,
                'tests' => $testsOpositor,
                'apuntes' => $apuntes,
                'entradas' => $entradas,
                'misCursos' => $misCursos,
                'mensajesPersonales' => $mensajesPersonales
            ]);
        }
    }
}
