@extends('layouts.social')

@section('contenido-social')   

<div class="contenido-social">
    <div class="banner" @if(!empty($portada)) style="background: url(../../storage/{{ $portada->portada}}); background-size: cover;"@endif>
        @if($user->id == Auth::user()->id )
        <form action="/user/red-social/subir-portada" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
            <label for="fotoPortada"><span class="icon-camera"></span></label>
            <input type="file" name="fotoPortada" id="fotoPortada" hidden>
            <input type="submit" value="Subir foto de portada">
        </form>
        @endif
        
    </div>
    <div class="info-usuario">
        <img src="{{Storage::disk('public')->url($user->image)}}" alt="">
        <div class="follower-count">
            <span style="color:white;">Follow {{ $user->follows->count() }}</span>
            <span style="color:white;">Followers {{ $user->followers->count() }}</span>
        </div>
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
    <div class="contenitore">
        <div class="fila">
        <div class="col-izq"></div>
        <div class="col-central">
            <div class="visualizar-mensaje">
                @foreach ($user->posts as $post)
                <div class="post">
                    <div class="cabecera-post">
                        <div class="left">
                            <img src="{{Storage::disk('public')->url($post->user->image)}}" alt="">
                        </div>
                        <div class="right">
                            <a href="/user/red-social/{{ $post->user->id }}"><span>{{ $user->name }} {{ $user->apellido }} {{ $user->apellidoDos }}</span> 
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
                </div>
                @endforeach
            </div>
        <div class="col-der">
            <h3>Le Siguen</h3>
            <div class="sugeridos">
                @forelse ($followers as $user)
                @if(Auth::user()->isFollowing($user))
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
                @empty
                <span>Nadie lo sigue</span>
                @endforelse
            </div>
            <h3>Sigue</h3>
            <div class="sugeridos">
                @forelse ($follows as $user)
                @if(Auth::user()->isFollowing($user))
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
                @empty
                <span>Nadie lo sigue</span>
                @endforelse
            </div>
        </div>
    </div>
</div>
</div>
@endsection