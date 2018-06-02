<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Opositore;
use App\Mail;

class MensajesController extends Controller
{
    public function enviar(Request $request)
    {
        $tipo = $request->input('tipo');
        $idGrupo = $request->input('idGrupo');
        $id = Auth::user()->id;
        $status = "No leido";

        if($tipo == 'Grupo'){

            $opositores = Opositore::where('curso_id',$idGrupo)->get();

            foreach ($opositores as $opositore){
                $mensajes = Mail::create([
                    'user_id'=> $id,
                    'titulo' => $request->input('titulo'),
                    'mensaje' => $request->input('mensaje'),
                    'reference_id' => $opositore->user_id,
                    'status' => $status,
                    'tipo' => $tipo
                ]);
               
            }

            return redirect('/user');
            
        }elseif($tipo == 'Privado'){
            $mensajes = Mail::create([
                'user_id'=> $id,
                'titulo' => $request->input('titulo'),
                'mensaje' => $request->input('mensaje'),
                'reference_id' => $request->input('idPersonal'),
                'status' => $status,
                'tipo' => $tipo
            ]);
            return redirect('/user');
        }
    }
}
