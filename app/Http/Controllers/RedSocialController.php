<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Follower;
use App\Opositore;
use App\User;
use App\Curso;
use App\Post;

class RedSocialController extends Controller
{
    public function usuario()
    {   

        $opositores = Opositore::all();
        $id = Auth::user()->id;
        $opositorId = Opositore::where('user_id',$id)->get();
        $cursos = Curso::all();
        $users = User::all();
        $posts = Post::all();

        return view('homesocial',[
            'opositores' => $opositores,
            'opositorId' => $opositorId,
            'id' => $id,
            'cursos' => $cursos,
            'users' => $users,
            'posts' => $posts
        ]);
    }

    public function buscar(Request $request)
    {
        $opositores = Opositore::all();
        $id = Auth::user()->id;
        $opositorId = Opositore::where('user_id',$id)->get();
        $cursos = Curso::all();
        $users = User::all();
        $parametro = $request->input('parametro');
        $buscados =\App\User::search($parametro)->get();

        return view('buscarsocial',[
            'opositores' => $opositores,
            'opositorId' => $opositorId,
            'id' => $id,
            'cursos' => $cursos,
            'users' => $users,
            'buscados' => $buscados
        ]);
    }

    public function follow(Request $request)
    {
        $id = $request->input('user');
        $user = User::where('id',$id)->first();
        $me = $request->user();
        $me->follows()->attach($user);
        return "Ahora lo sigues";
    }

    public function unfollow(Request $request)
    {
        $id = $request->input('user');
        $user = User::where('id',$id)->first();
        $me = $request->user();
        $me->follows()->detach($user);
        return "Ahora lo sigues";
    }

    public function post(Request $request)
    {
        $id = Auth::user()->id;
        $image = $request->file('imagen');
        if(!empty($image)){
           $imagen = $image->store('post','public');
        }else{
            $imagen = "";
        }

        $posts = Post::create([
            'user_id' => $id,
            'post' => $request->input('mensaje'),
            'image' => $imagen,
        ]);
    }

    public function show($id)
    {
        $user = User::where('id',$id)->first();

        return view('usuario',[
            'user' => $user
        ]);
    }
}
