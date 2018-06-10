@extends('layouts.social')

@section('contenido-social')   

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 perfil-sn">
                <div class="personal-imagen">
            	    <img src="{{Storage::disk('public')->url(Auth::user()->image)}}"  alt="">
				    <h1>{{Auth::user()->name}} {{Auth::user()->apellido}} {{Auth::user()->apellidoDos}} </h1>
			    </div>
                <div class="sugerencias">
                    <h4>sugerencias</h4>
                    <div class="usuario-sugerido">
                    </div>
                </div>
                <div class="sugeridos">
                    @forelse($opositorId as $Id)
                        @foreach($cursos as $curso)
                        @if($curso->id == $Id->curso_id )
                            <h5>{{ $curso->oposicione->descripcion }}</h5>
                        @foreach ($opositores as $opositor)
                            @if($opositor->curso_id == $Id->curso_id && $opositor->user_id != $id)
                                <div class="sugerido">
                                    <img src="{{Storage::disk('public')->url($opositor->user->image)}}" alt="">
                                    <span>{{ $opositor->user->name }} {{ $opositor->user->apellido }} {{ $opositor->user->apellidoDos }}</span>
                                    <button>Follow</button>
                                </div>
                            @endif
                        @endforeach
                        @foreach ( $users as $user)
                            @if ($user->id == $Id->preparador_id)
                                <div class="sugerido">
                                    <img src="{{Storage::disk('public')->url($user->image)}}" alt="">
                                    <span>{{ $user->name }} {{ $user->apellido }} {{ $user->apellidoDos }}</span>
                                    <button ="asi">Follow</button>
                                </div>
                            @endif
                        @endforeach
                        @endif
                        @endforeach
                    @empty
                        
                    @endforelse

                </div>
            </div>
            <div class="col-lg-8 mensajes-sn">
                
                <div class="visualizar-usuarios-sn">
                    @foreach ($buscados as $user)
                        @if($user->id != $id)
                        <div class="buscado">
                            <div class="left">
                            <img src="{{Storage::disk('public')->url($user->image)}}" alt="">
                            <span>{{ $user->name }} {{ $user->apellido }} {{ $user->apellidoDos }}</span>
                            </div>
                            <div class="right">
                            @if(Auth::user()->isFollowing($user))
                                 <form action="/red-social/unfollow" method="POST">
                                    {{ csrf_field() }}
                                    <input type="text" value="{{ $user->id }}" name="user" hidden>
                                     <button>Dejar de seguir</button>
                                </form>
                            @else
                                <form action="/red-social/follow" method="POST">
                                    {{ csrf_field() }}
                                    <input type="text" value="{{ $user->id }}" name="user" hidden>
                                     <button>Seguir</button>
                                </form>
                            @endif
                            </div>
                        </div>
                        @endif
                    @endforeach    
                </div>
            </div>
        </div>
    </div>

@endsection