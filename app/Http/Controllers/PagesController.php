<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Oposicione;



class PagesController extends Controller
{
    public function usuario()
    {   
       
        $user = Auth::user()->role;
        $image = Auth::user()->image;
        $oposiciones = Oposicione::orderBy('descripcion', 'ASC')->get();
        

        if($user == 'Academia'){

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
        }else if($user == 'Preparador'){

            $title = 'Preparador';

            $main = 'preparador';

            $title_home = [
                'uno' => 'bienvenid@!',
                'dos' => 'Ultimas opiniones',
                'tres' => 'Tareas pendientes',
                'cuatro' => 'Cursos',
                'cinco' => 'Notificaciones',
            ];

            return view('preparador',[
                'title' => $title,
                'main' => $main,
                'title_home' => $title_home,
                'oposiciones' => $oposiciones
            ]);

        }else if($user == 'Opositor'){

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
