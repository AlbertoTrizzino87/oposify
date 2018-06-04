@extends('layouts.app')

@section('title')
	{{$title}}
@endsection

@section('content')
<main id='{{$main}}'>
		<header class="header">
			<img src="{{Storage::disk('public')->url(Auth::user()->image)}}"  class="foto-user">
			<div id="logo">
				<a href="{{ url('/user') }}"><img src="img/Logo-TuOposify-negro.png" title="logotipo" alt="Logotipo tuOposify"></a>     
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
			<a href="#" id="clases-trigger">clases</a>
			<a href="#" id="temario-trigger">temario</a>
			<a href="#" id="apuntes-trigger">apuntes</a>
			<a href="#" id="test-trigger">test</a>
			<a href="#" id="mensajes-trigger">mensajes</a>
			<a href="#" id="diario-trigger">diario</a>
			<a href="#" id="buscar-trigger">buscar curso</a>
			<a href="{{ url('/user/red-social') }}">Red social</a>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">{{ __('Cerrar sessión') }}</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                     </form>
		</nav> 

		<div class="menu-mobile">
			<span class="icon-play-button" id="clases-mobile-trigger"></span>
			<span class="icon-books-stack-of-three" id="temario-mobile-trigger"></span>
			<span class="icon-contract" id="apuntes-mobile-trigger"></span>
			<span class="icon-exam" id="test-mobile-trigger"></span>
			<span class="icon-paper-plane" id="mensajes-mobile-trigger"></span>
			<span class="icon-quill-drawing-a-line" id="diario-mobile-trigger"></span>
			<span class="icon-lupa" id="buscar-mobile-trigger"></span>
		</div>

		<div class="container-fluid feeds">
			<div class="row">
				<div class="fila col-12 col-lg-4">
					<div class="block desaparecer">
						<h3>{{$title_home['uno']}}</h3>
					</div>
					<div class="block desaparecer" id="mini-curso">
						<h3>{{$title_home['cuatro']}}</h3>
						@forelse ($misCursos as $curso)
							<div class="mini-curso">
								<span>{{ $curso->profesor->name }}</span>
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
					<div class="full-block" id="tareas-pendientes">
					<h3>{{$title_home['tres']}}</h3>
						<form action="/user/crear-tarea" method="POST">
							{{ csrf_field() }}
							<input type="text" name="tarea" id="" placeholder="Añadir nueva tarea">
							<button>Añadir</button>
						</form>
						@forelse ($tareas as $tarea)
							<div class="tarea">
								<span>{{ $tarea->tarea }}</span>
								<form action="/user/borrar-tarea" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="id" value="{{ $tarea->id }}">
									<button><span class="icon-cross"></span></button>
								</form>
							</div>
						@empty
							<span>No hay tareas pendientes</span>
						@endforelse
					</div>
					</div>
				</div>
			</div>
		</div>


       <section class="contenido" id="clases">
			<div class="cabezera">
				<span class="icon-cross" id="close-clases"></span>
			</div>
			<h3>clases</h3>
			<div class="box">
				<div class="content-box">
					<ul class="nav nav-tabs" id="videoTab" role="tablist">
						@forelse ($opositorId as $id)
							<li class="nav-item"><a id="{{ $id->curso }}-tab" href="#{{ $id->curso }}" data-toggle="tab" role="tab" aria-controls="home" aria-selected="{{ $id->curso }}">{{ $id->curso }}</a></li>
						@empty
							<span>No hay cursos disponibles</span>
						@endforelse
					</ul>
					<div class="tab-content" id="videoTabContent">
						@foreach ($opositorId as $id)
							<div class="tab-pane" id="{{ $id->curso }}" role="tabpanel" aria-labelledby="{{ $id->curso }}-tab">
								<div class="container">
									<div class="row">
										@foreach ($videos as $video)
											@if($video->curso_id == $id->curso_id)
											<div class="col-md-3 col-lg-4">
													<video controls>
														<source src="{{ Storage::disk('public')->url($video->video) }}" type="video/mp4">
													</video>
													<h5>{{ $video->titulo }}</h5>
												</div>
											@endif
										@endforeach	
									</div>
								</div>
							</div>
						@endforeach	
					</div>
				</div>
			</div>
		</section>
		
		<section class="contenido" id="temario">
			<div class="cabezera">
				<span class="icon-cross" id="close-temario"></span>
			</div>
			<h3>temario</h3>
			<div class="box">
				<div class="content-box">
					<ul class="nav nav-tabs" id="videoTab" role="tablist">
						@forelse ($opositorId as $id)
							<li class="nav-item"><a id="{{ $id->curso }}-tab" href="#2{{ $id->curso }}" data-toggle="tab" role="tab" aria-controls="home" aria-selected="{{ $id->curso }}">{{ $id->curso }}</a></li>
						@empty
							<span>No hay cursos disponibles</span>
						@endforelse
					</ul>
					<div class="tab-content" id="videoTabContent">
						@foreach ($opositorId as $id)
							<div class="tab-pane" id="2{{ $id->curso }}" role="tabpanel" aria-labelledby="{{ $id->curso }}-tab">
								<div class="container">
									<div class="row">
										@foreach ($temas as $tema)
											@if($tema->curso_id == $id->curso_id)
											<div class="col-md-3 col-lg-4">
													<div>
														<a href="{{ Storage::disk('public')->url($tema->tema) }}" target="_blank"><span class="icon-books-stack-of-three"></span></a>
													</div>
													<h5>{{ $tema->titulo }}</h5>
												</div>
											@endif
										@endforeach	
									</div>
								</div>
							</div>
						@endforeach	
					</div>
				</div>
			</div>
		</section>
		
		<section class="contenido" id="apuntes">
			<div class="cabezera">
				<span class="icon-cross" id="close-apuntes"></span>
			</div>
			<h3>apuntes</h3>
			<div class="anadir-curso">
				<span id="new-apunte">subir apuntes</span>
			</div>
			<div class="box">
				<div class="content-box">
					<ul class="nav nav-tabs" id="videoTab" role="tablist">
						@forelse ($opositorId as $id)
							<li class="nav-item"><a id="{{ $id->curso }}-tab" href="#5{{ $id->curso }}" data-toggle="tab" role="tab" aria-controls="home" aria-selected="{{ $id->curso }}">{{ $id->curso }}</a></li>
						@empty
							<span>No hay apuntes disponibles</span>
						@endforelse
					</ul>
					<div class="tab-content" id="videoTabContent">
						@foreach ($opositorId as $id)
							<div class="tab-pane" id="5{{ $id->curso }}" role="tabpanel" aria-labelledby="{{ $id->curso }}-tab">
								<div class="container">
									<div class="row">
										@foreach ($apuntes as $apunte)
											@if($apunte->curso_id == $id->curso_id)
											<div class="col-md-3 col-lg-4">
													<div>
														<a href="{{ Storage::disk('public')->url($apunte->apuntes) }}" target="_blank"><span class="icon-books-stack-of-three"></span></a>
													</div>
													<h5>{{ $apunte->titulo }}</h5>
												</div>
											@endif
										@endforeach	
									</div>
								</div>
							</div>
						@endforeach	
					</div>
				</div>
			</div>
		</section>

		<section class="add-to-db" id="add-apunte">
			<span class="icon-cross" id="close-add-apunte"></span>
			<div class="add-content">
			<form action="/user/apunte-creado" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<label for="oposicion">Elegir el curso</label>
				<select name="oposicion">
				@forelse ($opositorId as $id)
				<option value="{{ $id->curso_id }}">{{ $id->curso }}</option>
				@empty
				<option value="">No hay cursos disponibles</option>
				@endforelse
				</select>
				<label for="titulo" id="apunte">Titulo</label>
				<input type="text" name="titulo" id="">
				<label for="apuntes">Subir apuntes - formato PDF</label>
				<input type="file" name="apuntes" id="">
				<input type="submit" value="Subir apuntes" name="subirApunte">
			</form>
			</div>
		</section>
		
		<section class="contenido" id="test">
			<div class="cabezera">
				<span class="icon-cross" id="close-test"></span>
			</div>
			<h3>test</h3>
			<div class="box">
				<div class="content-box">
					<ul class="nav nav-tabs" id="videoTab" role="tablist">
						@forelse ($opositorId as $id)
							<li class="nav-item"><a id="{{ $id->curso }}-tab" href="#3{{ $id->curso }}" data-toggle="tab" role="tab" aria-controls="home" aria-selected="{{ $id->curso }}">{{ $id->curso }}</a></li>
						@empty
							<span>No hay cursos disponibles</span>
						@endforelse
					</ul>
					<div class="tab-content" id="videoTabContent">
						@foreach ($opositorId as $id)
							<div class="tab-pane" id="3{{ $id->curso }}" role="tabpanel" aria-labelledby="{{ $id->curso }}-tab">
								<div class="container">
									<div class="row">
										@foreach ($tests as $test)
											@if($test->curso_id == $id->curso_id)
											<div class="col-md-3 col-lg-4">
													<div>
														<a href="{{ Storage::disk('public')->url($test->test) }}" target="_blank"><span class="icon-exam"></span></a>
													</div>
													<h5>{{ $test->titulo }}</h5>
												</div>
											@endif
										@endforeach	
									</div>
								</div>
							</div>
						@endforeach	
					</div>
				</div>
			</div>
		</section>
		
		<section class="contenido" id="mensajes">
			<div class="cabezera">
				<span class="icon-cross" id="close-mensajes"></span>
			</div>
			<h3>mensajes</h3>
			<div class="anadir-curso">
				<span id="new-mensajes">nuevo mensaje</span>
			</div>
			<div class="box">
				<div class="content-box">
					@forelse ($mensajesPersonales as $mensaje)
						<div class="mensajes-personal">
							<img src="{{Storage::disk('public')->url($mensaje->user->image)}}" width="100px"  alt="">
							<div class="info-mensaje">
								<span>{{ $mensaje->user->name }} {{ $mensaje->user->apellido }} {{ $mensaje->user->apellidoDos }}</span><br>
								<span>{{ $mensaje->titulo }}</span>
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

		<section class="add-to-db" id="add-mensajes">
			<span class="icon-cross" id="close-add-mensajes"></span>
			<div class="add-content">
			<form action="/user/enviar-mensaje" method="post">
			{{ csrf_field() }}
				<input type="text" name="tipo" value="Privado" id="">
				<select name="idPersonal" id="" class="privado">
				@forelse($misCursos  as $cursos)
						<option value="{{ $cursos->preparador_id}}">{{ $cursos->profesor->name }}</option>
					@empty
						<option value="null">No hay preparador</option>
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
		
		<section class="contenido" id="diario">
			<div class="cabezera">
				<span class="icon-cross" id="close-diario"></span>
			</div>
			<h3>diario</h3>
			<div class="anadir-curso">
				<span id="new-diario">añadir entrada</span>
			</div>
			<div class="blog">
				@forelse ($entradas as $entrada)
					<div class="entrada col-md-4">					
						<img src="{{Storage::disk('public')->url($entrada->portada)}}" alt="">
						<form action="/user/leer-entrada" method="POST" class="leer-entrada">
							{{ csrf_field() }}
							<input type="text" name="id"  value="{{$entrada->id }}" hidden>
							<button>{{ $entrada->titulo }}</button>
						</form>
					</div>
				@empty
					<p>No has subido todavia nada</p>
				@endforelse
			</div>
        </section>

		<section class="add-to-db" id="add-diario">
			<span class="icon-cross" id="close-add-diario"></span>
			<div class="add-content">
			<form action="/user/entrada-creada" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<label for="titulo entrada">Titulo</label>
				<input type="text" name="titulo" id="">
				<label for="portada">Imagen destacada</label>
				<input type="file" name="portada" id="portada">
				<textarea name="contenido" placeholder="¿Que tal ha ido hoy?"></textarea>
				<input type="submit" value="Subir entrada" name="subirApunte">
			</form>
			</div>
		</section>

		<section class="contenido" id="buscar">
			<div class="cabezera">
				<span class="icon-cross" id="close-buscar"></span>
				<form action="/buscar" method="GET" id="buscar-preparador-opositor">
				{{ csrf_field() }}
				<input type="text" name="parametro" placeholder="Buscar preparador,academia u oposición">
				<input type="submit" name="buscar" value="Buscar" id="buscarPreparadorOpositor">
				</form>
			</div>
			<div class="resultados" id="resultados">
					@forelse ($resultados as $resultado)
						<div class="busqueda-layout">
							 	<div class="layout-left col-md-2">
							 		<img src="{{Storage::disk('public')->url($resultado->user->image)}}" alt="">
								 	@if (empty($resultado->user->apellido))
								 	<span>{{ $resultado->user->name }}</span>
								 	@elseif (empty($resultado->user->apellidoDos))
								 	<span>{{ $resultado->user->name }} {{ $resultado->user->apellido }}</span>
								 	@else 
								 	<span>{{ $resultado->user->name }} {{ $resultado->user->apellido }} <br> {{ $resultado->user->apellidoDos }}</span>
								 	@endif
								</div>
								<div class="layout-center col-md-7">
									<h5>{{ $resultado->oposicione->descripcion }}</h5>
									<p>{{ $resultado->descripcion }}</p>
								</div>
								<div class="layout-right col-md-3">
									<span>{{ $resultado->precio }}€</span>
									<form action="{!! URL::to('paypal') !!}" method="POST" id="payment-form">
										{{ csrf_field() }}
										<input type="text" name="amount" id="amount" value="{{ $resultado->precio }}" hidden>
										<input type="text" name="idPreparador" id="idPreparador" value="{{ $resultado->user_id }}" hidden>
										<input type="text" name="nombreCurso" id="nombreCurso" value="{{ $resultado->oposicione->descripcion }}" hidden>
										<input type="text" name="idCurso" id="idCurso" value="{{ $resultado->id }}" hidden>
										<button>comprar</button>
									</form>
								</div>
						</div>
					@empty
						
					@endforelse
				</div>
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

		<section  id="entrada-space" style="background-color:white; z-index:9999;">
			<span class="icon-cross" id="close-secret-entrada"></span>
			<div class="espacio-entrada"></div>
		</section>
	</main>
@endsection