<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Peticione;
use App\Profesore;

class PeticionesController extends Controller
{
    public function anadir(Request $request)
    {
        $id_user_1 = Auth::user()->id;
        $id_user_2 = $request->input('idPrepa');
        
        $peticiones = Peticione::create([
            'user_id' => $id_user_1,
            'id_user_2' => $id_user_2,
            
        ]);
        return redirect('/user');
    }

    public function aceptar(Request $request)
    {
        $id_preparador = Auth::user()->id;
        $id_academia = $request->input('idAcademia');
        $id = $request->input('idPeticion');
        
        $peticiones = Profesore::create([
            'id_preparador' => $id_preparador,
            'id_academia' => $id_academia,
            
        ]);
        Peticione::where('id',$id)->first()->delete();

        return redirect('/user');

       
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('idPreparador');
        Profesore::destroy($id);
        return redirect('/user');
    }
}
