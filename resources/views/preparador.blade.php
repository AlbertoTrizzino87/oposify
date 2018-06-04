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
			<a href="#" id="cursos-trigger">cursos</a>
			<a href="#" id="video-trigger">clases</a>
			<a href="#" id="tema-trigger">temas</a>
			<a href="#" id="testp-trigger">test</a>
			<a href="#" id="mensajesp-trigger">mensajes</a>
			<a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">{{ __('Cerrar sessión') }}</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                     </form>
		</nav>

		<div class="menu-mobile">
			<span class="icon-mortarboard" id="cursos-mobile-trigger"></span>
			<span class="icon-play-button" id="clasesp-mobile-trigger"></span>
			<span class="icon-books-stack-of-three" id="temariop-mobile-trigger"></span>
			<span class="icon-exam" id="testp-mobile-trigger"></span>
			<span class="icon-paper-plane" id="mensajesp-mobile-trigger"></span>
		</div>

		<div class="conteiner feeds">
			<div class="row">
				<div class="fila col-12 col-md-4">
					<div class="block desaparecer">
						<h3>{{$title_home['uno']}}</h3>
					</div>
					<div class="block desaparecer" id="mini-curso">
						<h3>{{$title_home['cuatro']}}</h3>
						@forelse ($cursos_id as $curso)
							<div class="mini-curso">
								<span>{{ $curso->oposicione->descripcion }}</span>
							</div>
						@empty
							<span>Todavia no hay cursos</span>
						@endforelse
					</div>
				</div>
				<div class="fila col-12 col-md-4">
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
								<span style="color:white; text-transform:uppercase;">No hay mensajes</span>
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
				<div class="fila col-12 col-md-4">
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

		<section class="contenido" id="cursos">
			<div class="cabezera">
				<span class="icon-cross" id="close-cursos"></span>
			</div>
			<h3>cursos</h3>
			<div class="anadir-curso">
				<span id="new-course">añadir curso</span>
			</div>
				<div class="box" id="box-cursos">
				@forelse ($cursos_id as $curso)
				<div class="content-box">
				<div class="box-header">
					<h4>{{$curso->oposicione->descripcion}}</h4>
					<span>{{ $curso->precio}}€ mes</span>
				</div>
				<div class="box-description">
					<p>{{ $curso->descripcion }}</p>
				</div>
				<div class="box-bottom">
					<form action="/user/eliminar-curso" method="POST" class="eliminar-curso">
						<input type="hidden" name="id" value="{{$curso->id}}">
						<button class="eliminarCurso">Eliminar</button>
					</form>
				</div>
				</div>										
				@empty
					<p>No se ha creado ningun curso</p>
				@endforelse
				</div>
			
		</section>

		<section class="add-to-db" id="add-curso">
			<span class="icon-cross" id="close-add-course"></span>
			<div class="add-content">
			<form action="/user/curso-creado" method="POST" id="crearCurso">
				
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenCurso">
				<label for="oposicion">Elegir el tipo de oposicion</label>
				<select name="oposicion" id="curso">
				@forelse ($oposiciones as $oposicion)
				<option value="{{ $oposicion->id }}">{{ $oposicion->descripcion }}</option>
				@empty
				<option value="">No hay oposiciones disponibles</option>
				@endforelse
				</select>
				<select name="dueno" id="tipo">
					<option value="{{Auth::user()->id}}">Personal</option>
					@forelse ($academias as $academia)
					<option value="{{ $academia->id_academia }}">{{ $academia->academia->name }}</option>
					@empty
					<option value="">No hay ninguna collaboración</option>
					@endforelse
				</select>
				<input type="text" name="preparador" value="{{Auth::user()->id}}" id="preparadorCurso" hidden>
				<label for="descripcion">Descripción</label>
				<textarea name="descripcion" id="" cols="30" rows="10" id="descripcionCurso"></textarea>
				@if ($errors -> has('descripcion'))
					@foreach ($errors->get('descripcion') as $error)
						<div>{{ $error }}</div>
					@endforeach
				@endif
				<label for="precio">Precio</label>
				<input type="text" name="precio" id="precioCurso">
				<p id="cursoCreado" style="color:green; display:none;"></p>
				<input type="submit" value="Crear curso" name="crearCurso" id="subirCurso">
			</form>
			</div>
		</section>

		<section class="contenido" id="video">
			<div class="cabezera">
				<span class="icon-cross" id="close-video"></span>
			</div>
			<h3>videos</h3>
			<div class="anadir-curso">
				<span id="new-video">añadir video</span>
			</div>
			<div class="box">
				<div class="content-box">
					<ul class="nav nav-tabs" id="videoTab" role="tablist">
						@forelse ($cursosid as $cursoid)
							<li class="nav-item"><a id="{{ $cursoid->oposicione->descripcion }}-tab" href="#{{ $cursoid->oposicione->descripcion }}" data-toggle="tab" role="tab" aria-controls="home" aria-selected="{{ $cursoid->oposicione->descripcion }}">{{ $cursoid->oposicione->descripcion }}</a></li>
						@empty
							<span>No hay cursos disponibles</span>
						@endforelse
					</ul>
					<div class="tab-content" id="videoTabContent">
						@foreach ($cursosid as $cursoid)					
							<div class="tab-pane" id="{{ $cursoid->oposicione->descripcion }}" role="tabpanel" aria-labelledby="{{ $cursoid->oposicione->descripcion }}-tab">
								<div class="container">
									<div class="row">
										@foreach ($videos as $video)
											@if($video->curso_id == $cursoid->id)	
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

		<section class="add-to-db" id="add-video">
			<span class="icon-cross" id="close-add-video"></span>
			<div class="add-content">
			<form action="/user/video-creado" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<label for="oposicion">Elegir el curso</label>
				<select name="oposicion">
				@forelse ($cursosid as $cursoid)
				<option value="{{ $cursoid->id }}">{{ $cursoid->oposicione->descripcion }}</option>
				@empty
				<option value="">No hay cursos disponibles</option>
				@endforelse
				</select>
				<label for="titulo" id="video">Titulo</label>
				<input type="text" name="titulo" id="">
				<label for="video">Subir video - formato mp4</label>
				<input type="file" name="video" id="">
				<input type="submit" value="Subir video"  name="subirVideo">
			</form>
			</div>
		</section>

		<section class="contenido" id="tema">
			<div class="cabezera">
				<span class="icon-cross" id="close-tema"></span>
			</div>
			<h3>temas</h3>
			<div class="anadir-curso">
				<span id="new-tema">añadir tema</span>
			</div>
			<div class="box">
				<div class="content-box">
					<ul class="nav nav-tabs" id="temaTab" role="tablist">
						@forelse ($cursosid as $cursoid)
							<li class="nav-item"><a id="{{ $cursoid->oposicione->descripcion }}-tab" href="#2{{ $cursoid->oposicione->descripcion }}" data-toggle="tab" role="tab" aria-controls="{{ $cursoid->oposicione->descripcion }}" aria-selected="{{ $cursoid->oposicione->descripcion }}">{{ $cursoid->oposicione->descripcion }}</a></li>
						@empty
							<option value="">No hay temario disponibles</option>
						@endforelse
					</ul>
					<div class="tab-content" id="temaTabContent">
						@foreach ($cursosid as $cursoid)					
							<div class="tab-pane" id="2{{ $cursoid->oposicione->descripcion }}" role="tabpanel" aria-labelledby="{{ $cursoid->oposicione->descripcion }}-tab">
								<div class="container">
									<div class="row">
										@foreach ($temas as $tema)
											@if($tema->curso_id == $cursoid->id)	
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

		<section class="add-to-db" id="add-tema">
			<span class="icon-cross" id="close-add-tema"></span>
			<div class="add-content">
			<form action="/user/tema-creado" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<label for="oposicion">Elegir el curso</label>
				<select name="oposicion">
				@forelse ($cursosid as $cursoid)
				<option value="{{ $cursoid->id }}">{{ $cursoid->oposicione->descripcion }}</option>
				@empty
				<option value="">No hay cursos disponibles</option>
				@endforelse
				</select>
				<label for="titulo" id="video">Titulo</label>
				<input type="text" name="titulo" id="">
				<label for="tema">Subir tema - formato pdf</label>
				<input type="file" name="tema" id="">
				<input type="submit" value="Subir tema" name="subirTema">
			</form>
			</div>
		</section>

		<section class="contenido" id="testp">
			<div class="cabezera">
				<span class="icon-cross" id="close-testp"></span>
			</div>
			<h3>tests</h3>
			<div class="anadir-curso">
				<span id="new-testp">añadir test</span>
			</div>
			<div class="box">
				<div class="content-box">
					<ul class="nav nav-tabs" id="temaTab" role="tablist">
						@forelse ($cursosid as $cursoid)
							<li class="nav-item"><a id="{{ $cursoid->oposicione->descripcion }}-tab" href="#3{{ $cursoid->oposicione->descripcion }}" data-toggle="tab" role="tab" aria-controls="{{ $cursoid->oposicione->descripcion }}" aria-selected="{{ $cursoid->oposicione->descripcion }}">{{ $cursoid->oposicione->descripcion }}</a></li>
						@empty
							<option value="">No hay temario disponibles</option>
						@endforelse
					</ul>
					<div class="tab-content" id="temaTabContent">
						@foreach ($cursosid as $cursoid)					
							<div class="tab-pane" id="3{{ $cursoid->oposicione->descripcion }}" role="tabpanel" aria-labelledby="{{ $cursoid->oposicione->descripcion }}-tab">
								<div class="container">
									<div class="row">
										@foreach ($tests as $test)
											@if($test->curso_id == $cursoid->id)	
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

		<section class="add-to-db" id="add-testp">
			<span class="icon-cross" id="close-add-testp"></span>
			<div class="add-content">
			<form action="/user/test-creado" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<label for="oposicion">Elegir el curso</label>
				<select name="oposicion">
				@forelse ($cursosid as $cursoid)
				<option value="{{ $cursoid->id }}">{{ $cursoid->oposicione->descripcion }}</option>
				@empty
				<option value="">No hay cursos disponibles</option>
				@endforelse
				</select>
				<label for="titulo" id="video">Titulo</label>
				<input type="text" name="titulo" id="">
				<label for="test">Subir test - formato pdf</label>
				<input type="file" name="test" id="">
				<input type="submit" value="Subir test" name="subirTest">
			</form>
			</div>
		</section>

		<section class="contenido" id="mensajesp">
			<div class="cabezera">
				<span class="icon-cross" id="close-mensajesp"></span>
			</div>
			<h3>mensajes</h3>
			<div class="anadir-curso">
				<span id="new-mensajesp">nuevo mensaje</span>
			</div>
			<div class="box">
				<div class="content-box">
					@forelse ($mensajesPersonales as $mensaje)
						<div class="mensajes-personal">
							<img src="{{Storage::disk('public')->url($mensaje->user->image)}}" width="100px"  alt="">
							<div class="info-mensaje">
								<h6>{{ $mensaje->user->name }} {{ $mensaje->user->apellido }} {{ $mensaje->user->apellidoDos }}</h6><br>
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

		<section class="add-to-db" id="add-mensajesp">
			<span class="icon-cross" id="close-add-mensajesp"></span>
			<div class="add-content">
			<form action="/user/enviar-mensaje" method="POST">
			{{ csrf_field() }}
				<select name="tipo" class="mensaje-select">
					<option value="Grupo" >Grupo</option>
					<option value="Privado" >Privado</option>
				</select>
				<select name="idGrupo" id="" class="grupo">
					@forelse($cursos_id as $cursos)
						<option value="{{ $cursos->id }}">{{$cursos->oposicione->descripcion}}</option>
					@empty
						<option value="null">No hay ningun curso creado</option>
					@endforelse
				</select>
				<select name="idPersonal" id="" style="display:none;" class="privado">
				@forelse($cursos_id as $cursos)
						@foreach ($alumnosPreparador as $alumnoPreparador)
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

		
		
       
	</main>
@endsection