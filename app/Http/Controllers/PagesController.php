<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Oposicione;
use App\Curso;
use App\Video;
use App\Tema;


class PagesController extends Controller
{
    public function usuario()
    {   
        $id = Auth::user()->id;
        $userRole = Auth::user()->role;
        $image = Auth::user()->image;
        $oposiciones = Oposicione::orderBy('descripcion', 'ASC')->get();
        $cursos = Curso::all();
        $user = Auth::user();
        $oposiciones = Oposicione::all();
        $cursos_id = Curso::where('user_id',$id)->get();
        $videos = Video::where('user_id',$id)->get();
        $temas = Tema::where('user_id',$id)->get();
        

        if($userRole == 'Academia'){

            $title = 'Academia';

            $main = 'academia';

            $title_home = [
                'uno' => 'bienvenid@!',
                'dos' => 'Ultimas opiniones',
                'tres' => 'Profesorado',
                'cuatro' => 'Cursos',
                'cinco' => 'Notificaciones',
            ];

            return view('user',[
            
                'title' => $title,
                'main' => $main,
                'title_home' => $title_home
            ]);
        }else if($userRole == 'Preparador'){

            $title = 'Preparador';

            $main = 'preparador';

            $title_home = [
                'uno' => 'bienvenid@!',
                'dos' => 'Ultimas opiniones',
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
                'temas' => $temas
            ]);

        }else if($userRole == 'Opositor'){

            $title = 'Opositor';

            $main = 'opositor';

            $title_home = [
                'uno' => 'bienvenid@!',
                'dos' => 'Timer',
                'tres' => 'Tareas pendientes',
                'cuatro' => 'Estadisticas',
                'cinco' => 'Repaso',
            ];

            return view('opositor',[
                'title' => $title,
                'main' => $main,
                'title_home' => $title_home,
                'image' => $image
            ]);
        }
    }
}
