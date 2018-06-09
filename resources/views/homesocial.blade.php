@extends('layouts.social')

@section('contenido-social')  
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 perfil-sn">
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
                            @endif
                        @endforeach
                        @foreach ( $users as $user)
                            @if ($user->id == $Id->preparador_id)
                                <div class="sugerido">
                                    <img src="{{Storage::disk('public')->url($user->image)}}" alt="">
                                    <span>{{ $user->name }} {{ $user->apellido }} {{ $user->apellidoDos }}</span>
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
                            @endif
                        @endforeach
                        @endif
                        @endforeach
                    @empty
                        
                    @endforelse

                </div>
            </div>
            <div class="col-md-12 col-lg-9 mensajes-sn">
                <div class="enviar-mensaje-sn">
                    <form action="/red-social/crear-post" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <textarea name="mensaje" placeholder="¿Que estás pensando?"></textarea>
                        <label for="imagen"><span class="icon-camera"></span></label>
                        <input type="file" name="imagen" id="imagen" style="display:none;"><br>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
                <div class="visualizar-mensaje-sn">
                    @forelse ($posts as $post)
                        @if(Auth::user()->isFollowing($post->user))
                            <div class="post">
                                <div class="cabecera-post">
                                    <div class="left">
                                        <img src="{{Storage::disk('public')->url($post->user->image)}}" alt="">
                                    </div>
                                     <div class="right">
                                        <a href="/user/red-social/{{ $post->user->id }}"><span>{{ $post->user->name }} {{ $post->user->apellido }} {{ $post->user->apellidoDos }}</span>                              
                                    </div>
                                </div>
                                <div class="mensaje-post">
                                    <div class="left"></div>
                                    <div class="right">
                                        <p>{{ $post->post }}</p>
                                        @if(!empty($post->image))
                                            <img src="{{Storage::disk('public')->url($post->image)}}" alt="">
                                        @endif
                                    </div>                                 
                                </div>
                            </div>
                        @endif
                    @empty
                        <span>No hay mensajes</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection