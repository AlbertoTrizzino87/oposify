@extends('layouts.app')

@section('title')
	{{$title}}
@endsection

@section('content')
<main id='{{$main}}'>
		<header class="header">
			<img src="{{Storage::disk('public')->url(Auth::user()->image)}}"  class="foto-user">
			<div id="logo">
				<a href="{{ URL('/user') }}"><img src="img/Logo-TuOposify-negro.png" title="logotipo" alt="Logotipo tuOposify"></a>
			</div>
			<span class="icon-hamburguesa" id="trigger-home"></span>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" id="close-user"><span class="icon-logout"></span></a>
					 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                     </form>
		</header>

		<nav class="nav">
			<div class="nav-top">
            	<img src="{{Storage::disk('public')->url(Auth::user()->image)}}"  alt="">
				<h1>{{Auth::user()->name}} </h1>
			</div>

			<div class="botones">
			<a href="#" id="cursosa-trigger">cursos</a>
			<a href="#" id="profesores-trigger">profesorado</a>
			<a href="#" id="mensajesa-trigger">mensajes</a>
			<a href="#" id="alumnos-trigger">alumnos</a>
			<a href="{{ url('/user/red-social') }}">Red social</a>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">{{ __('Cerrar sessión') }}</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                     </form>
			</div>
		</nav>

		<div class="menu-mobile">
			<span class="icon-mortarboard" id="cursosa-mobile-trigger"></span>
			<span class="icon-female-instructor-giving-a-lecture-standing-at-the-side-of-a-screen" id="profesores-mobile-trigger"></span>
			<span class="icon-paper-plane" id="mensajesa-mobile-trigger"></span>
			<span class="icon-female-graduate-student" id="alumnos-mobile-trigger"></span>
		</div>

		<div class="conteiner feeds">
			<div class="row">
				<div class="fila col-12 col-lg-4">
					<div class="block desaparecer">
						<h3>{{$title_home['uno']}}</h3>
					</div>
					<div class="block desaparecer" id="mini-curso">
						<h3>{{$title_home['cuatro']}}</h3>
						@forelse ($cursosAcademia as $curso)
							<div class="mini-curso">
								<span>{{ $curso->oposicione->descripcion }}</span>
							</div>
						@empty
							<span>Todavia no hay cursos</span>
						@endforelse
					</div>
				</div>
				<div class="fila col-12 col-lg-4">
					<div class="block" id="mensajes-personales">
						<h3>{{$title_home['dos']}}</h3>
						<div class="box">
							<div class="content-box">
								@forelse ($mensajesPersonales as $mensaje)
									@if($mensaje->status == "No leido")
										<div class="mensajes-personal">
											<img src="{{Storage::disk('public')->url($mensaje->user->image)}}" width="30px"  alt="">
											<div class="info-mensaje">
											<span>{{ $mensaje->user->name }} {{ $mensaje->user->apellido }} {{ $mensaje->user->apellidoDos }}</span><br>
											<span class="titulo-mensaje">{{ $mensaje->titulo }}</span>
											</div>
											
											<form action="/user/leer-mensaje" method="POST" class="leer-mensaje">
											{{ csrf_field() }}
											<input type="text" name="id"  value="{{$mensaje->id }}" hidden>
											<button>Leer</button>
											</form>
										</div>
									@endif
								@empty
								<span>No hay mensajes</span>
								@endforelse
							</div>
						</div>
					</div>
					<div class="block">
						<h3>{{$title_home['cinco']}}</h3>
						<div class="notificaciones">
							@if(Session::has('videoSubido'))
							<span style="color:green">El video se ha subido correctamente</span><br>
							@endif
							@if(Session::has('temaSubido'))
							<span style="color:green">El tema se ha subido correctamente</span><br>
							@endif
							@if(Session::has('testSubido'))
							<span style="color:green">El test se ha subido correctamente</span><br>
							@endif
							@forelse ($notificaciones as $notificacione)
								<div class="layout-left col-md-2">
									<img src="{{Storage::disk('public')->url($notificacione->usersPeticiones->image )}}">
								</div>
								<div class="layout-center col-md-7">
									<span>{{ $notificacione->usersPeticiones->name }}</span><br>
									<span>{{ $notificacione->usersPeticiones->email }}</span>
								</div>
								<div class="layout-right col-md-3">
									<form action="/user/aceptar-peticion" method="POST">
										{{ csrf_field() }}
										<input type="text" name="idPeticion" id="idPeticion" value="{{$notificacione->id }}" hidden>
										<input type="text" name="idAcademia" id="idAcademia" value="{{$notificacione->user_id }}" hidden>
										<button>Aceptar</button>
									</form>
								</div>
							@empty
								<span style="color:white; text-transform:uppercase;">No hay notoficaciones</span>
							@endforelse
						</div>
						
					</div>
				</div>
				<div class="fila col-12 col-lg-4">
					<div class="full-block">
						<h3>{{$title_home['tres']}}</h3>
						<div class="layout-profesor">
						@if(!empty($profesores))
						@forelse ($profesores as $profesore)
						<div class="layout-left col-md-2">
							<img src="{{Storage::disk('public')->url($profesore->preparador->image )}}" alt="">
						</div>
						<div class="layout-center col-md-8">
							<span>{{ $profesore->preparador->name }} {{ $profesore->preparador->apellido }} {{ $profesore->preparador->apellidoDos }}</span><br>
							<span class="mail-prof">{{ $profesore->preparador->email }}</span>
						</div>
						<div class="layout-right col-md-2">
							<form action="/user/eliminar-profesor" method="POST">
								{{ csrf_field() }}
								<input type="text" name="idPreparador" id="idPreparador" value="{{$profesore->id }}" hidden>
								<button><span class="icon-cross"></span></button>
							</form>
						</div>
						</div>
					@empty
					@endforelse
					@endif	
					</div>
				</div>
			</div>
		</div>
</div>

		<section class="contenido" id="cursosa">
			<div class="cabezera">
				<span class="icon-cross" id="close-cursosa"></span>
			</div>
			<h3>cursos</h3>
			<div class="box">
				@forelse ($cursosAcademia as $cursoAcademia)
				<div class="content-box">
				<div class="box-header">
					<h4>{{$cursoAcademia->oposicione->descripcion}}</h4>
					<span>{{ $cursoAcademia->precio}}€ mes</span>
				</div>
				</div>										
				@empty
					<p>No se ha creado ningun curso</p>
				@endforelse
			</div>
				
		</section>

		<section class="add-to-db" id="add-cursosa">
			<span class="icon-cross" id="close-add-cursosa"></span>
		</section>

		<section class="contenido" id="profesores">
			<div class="cabezera">
				<span class="icon-cross" id="close-profesores"></span>
			</div>
			<h3>profesores</h3>
			<div class="anadir-curso">
				<span id="new-profesores">añadir profesor</span>
			</div>
			<div class="box">
				<div class="content-box" id="profesor-view">
				<div class="layout-profesor">
					@forelse ($profesores as $profesore)
						<div class="layout-left col-md-2">
							<img src="{{Storage::disk('public')->url($profesore->preparador->image )}}" alt="">
						</div>
						<div class="layout-center col-md-8">
							<span>{{ $profesore->preparador->name }} {{ $profesore->preparador->apellido }} {{ $profesore->preparador->apellidoDos }}</span><br>
							<span>{{ $profesore->preparador->email }}</span>
						</div>
						<div class="layout-right col-md-2">
							<form action="/user/eliminar-profesor" method="POST">
								{{ csrf_field() }}
								<input type="text" name="idPreparador" id="idPreparador" value="{{$profesore->id }}" hidden>
								<button>Eliminar</button>
							</form>
						</div>
					@empty
					@endforelse
				</div>
				</div>
			</div>
		</section>

		<section class="add-to-db" id="add-profesores">
			<span class="icon-cross" id="close-add-profesores"></span>
			<form action="/buscar-preparador-academia" method="GET" >
				<input type="text" name="parametro" placeholder="Buscar preparador">
				<input type="submit" name="buscar2" value="Buscar" id="buscarPreparadorAcademia">
			</form>
			<div class="resultados" id="profesoresListados">
				
			</div>
		</section>

		<section class="contenido" id="mensajesa">
			<div class="cabezera">
				<span class="icon-cross" id="close-mensajesa"></span>
			</div>
			<h3>mensajes</h3>
			<div class="anadir-curso">
				<span id="new-mensajesa">nuevo mensaje</span>
			</div>
			<div class="box">
				<div class="content-box">
					@forelse ($mensajesPersonales as $mensaje)
						<div class="mensajes-personal">
							<img src="{{Storage::disk('public')->url($mensaje->user->image)}}" width="100px"  alt="">
							<div class="info-mensaje">
								<span>{{ $mensaje->user->name }} {{ $mensaje->user->apellido }} {{ $mensaje->user->apellidoDos }}</span><br>
								<span>objeto: {{ $mensaje->titulo }}</span>
							</div>
							<form action="/user/leer-mensaje" method="POST" class="leer-mensaje">
								{{ csrf_field() }}
								<input type="text" name="id"  value="{{$mensaje->id }}" hidden>
								<button>Leer</button>
							</form>
						</div>
					@empty
					<span>No hay mensajes</span>
					@endforelse
				</div>
			</div>
		</section>

		<section class="add-to-db" id="add-mensajesa">
			<span class="icon-cross" id="close-add-mensajesa"></span>
			<div class="add-content">
			<form action="/user/enviar-mensaje" method="post">
			{{ csrf_field() }}
				<select name="tipo" class="mensaje-select">
					<option value="Grupo" >Grupo</option>
					<option value="Privado" >Privado</option>
				</select>
				<select name="idGrupo" id="" class="grupo">
					@forelse($cursosAcademia as $cursos)
						<option value="{{ $cursos->id }}">{{$cursos->oposicione->descripcion}}</option>
					@empty
						<option value="null">No hay ningun curso creado</option>
					@endforelse
				</select>
				<select name="idPersonal" id="" style="display:none;" class="privado">
				@forelse($cursosAcademia  as $cursos)
						@foreach ($alumnos as $alumnoPreparador)
							@if( $alumnoPreparador->curso_id == $cursos->id)
								<option value="{{ $alumnoPreparador->id }}">{{ $alumnoPreparador->user->name }} {{ $alumnoPreparador->user->apellido }} {{ $alumnoPreparador->user->apellidoDos }}</option>
							@endif
						@endforeach
					@empty
						<option value="null">No hay alumnos</option>
					@endforelse
				</select>
				<label for="titulo">Titulo</label>
				<input type="text" name="titulo" id="">
				<label for="mensaje">Mensaje</label>
				<textarea name="mensaje" ></textarea>
				<input type="submit" value="Enviar">
			</form>
			</div>
		</section>

		<section class="contenido" id="alumnos">
			<div class="cabezera">
				<span class="icon-cross" id="close-alumnos"></span>

			</div>
			<h3>alumnos</h3>
			<div class="box">
				<div class="content-box">
					<ul class="nav nav-tabs" id="videoTab" role="tablist">
						@forelse ($cursosAcademia as $cursoAcademia)
							<li class="nav-item"><a id="{{ $cursoAcademia->oposicione->descripcion }}-tab" href="#{{ $cursoAcademia->oposicione->descripcion }}" data-toggle="tab" role="tab" aria-controls="home" aria-selected="{{ $cursoAcademia->oposicione->descripcion }}">{{ $cursoAcademia->oposicione->descripcion }}</a></li>
						@empty
							<span style="color:white;">No hay cursos disponibles</span>
						@endforelse
					</ul>
					<div class="tab-content" id="videoTabContent">
						@foreach ($cursosAcademia as $cursoAcademia)					
							<div class="tab-pane" id="{{ $cursoAcademia->oposicione->descripcion }}" role="tabpanel" aria-labelledby="{{ $cursoAcademia->oposicione->descripcion }}-tab">
								<div class="container">
									<div class="row">
										@if(!empty($profesore))
										@foreach ($alumnos as $alumno)
											@if($alumno->curso_id == $cursoAcademia->id)
											<div class="alumnos-layout">
											<div class="layout-left col-md-2">
												<img src="{{Storage::disk('public')->url($alumno->user->image )}}" alt="">
											</div>	
											<div class="layout-center col-md-8">
												<span>{{ $alumno->user->name }} {{ $alumno->user->apellido }} {{ $alumno->user->apellidoDos }}</span><br>
												<span class="mail-prof">{{ $alumno->user->email }}</span>
											</div>
											<div class="layout-right col-md-2">
												<form action="/user/eliminar-profesor" method="POST">
													{{ csrf_field() }}
													<input type="text" name="idPreparador" id="idPreparador" value="{{$profesore->id }}" hidden>
													<button>Eliminar</button>
												</form>
											</div>
											</div>	
											@endif
										@endforeach
										@endif
									</div>
								</div>
							</div>						
						@endforeach
					</div>
				</div>
			</div>
		</section>

		<section class="add-to-db" id="add-alumnos">
			<span class="icon-cross" id="close-add-alumnos"></span>
		</section>

		<section class="contenido" id="bonosa">
			<div class="cabezera">
				<span class="icon-cross" id="close-bonosa"></span>

			</div>
			<h3>bonos</h3>
			<div class="anadir-curso">
				<span id="new-bonosa">comprar bono</span>
			</div>
		</section>

		<section class="add-to-db" id="add-bonosa">
			<span class="icon-cross" id="close-add-bonosa"></span>
		</section>

		<section  id="mensaje-space" style="background-color:white; z-index:9999;">
			<span class="icon-cross" id="close-secret-mensaje"></span>
			<div class="bloque-corpo-mensaje">
				<p class="corpo-mensaje"></p>
			</div>
			
			<form action="/user/enviar-mensaje" method="post">
			{{ csrf_field() }}
				
				<div class="parte-escondida">
				
				</div>
				
				<label for="titulo">Titulo</label>
				<input type="text" name="titulo" id="">
				<label for="mensaje">Mensaje</label>
				<textarea name="mensaje" ></textarea>
				<input type="submit" value="Enviar">
			</form>
		</section>
	</main>
@endsection