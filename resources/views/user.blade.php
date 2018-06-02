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
			<a href="#" id="bonosa-trigger">bonos</a>
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
			<span class="icon-tickets" id="bonosa-mobile-trigger"></span>
		</div>

		<div class="conteiner feeds">
			<div class="row">
				<div class="fila col-12 col-md-4">
					<div class="block desaparecer">
						<h3>{{$title_home['uno']}}</h3>
					</div>
					<div class="block desaparecer">
						<h3>{{$title_home['cuatro']}}</h3>
					</div>
				</div>
				<div class="fila col-12 col-md-4">
					<div class="block">
						<h3>{{$title_home['dos']}}</h3>
						<div class="box">
							<div class="content-box">
								@forelse ($mensajesPersonales as $mensaje)
									@if($mensaje->status == "No leido")
										<div class="mensajes-personal">
											<img src="{{Storage::disk('public')->url($mensaje->user->image)}}" width="30px"  alt="">
											<span>{{ $mensaje->user->name }} {{ $mensaje->user->apellido }} {{ $mensaje->user->apellidoDos }}</span>
											<button>Leer</button>
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
					</div>
				</div>
				<div class="fila col-12 col-md-4">
					<div class="full-block">
						<h3>{{$title_home['tres']}}</h3>
					</div>
				</div>
			</div>
		</div>

		<section class="contenido" id="cursosa">
			<div class="cabezera">
				<span class="icon-cross" id="close-cursosa"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar cursos">
					<input type="submit" name="buscar" value="Buscar">
				</form>
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
				<div class="content-box">
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
		</section>

		<section class="add-to-db" id="add-profesores">
			<span class="icon-cross" id="close-add-profesores"></span>
			<form action="/buscar-preparador" method="GET">
				<input type="text" name="parametro" placeholder="Buscar preparador">
				<input type="submit" name="buscar2" value="Buscar">
			</form>
			<div class="resultados">
				@forelse ($resultadoPreparadores as $resultadoPreparadore)
					<div class="busqueda-layout">
						<div class="layout-left col-md-2">
							<img src="{{Storage::disk('public')->url($resultadoPreparadore->image)}}" alt="">
						</div>
						<div class="layout-center col-md-7">
							<span>{{ $resultadoPreparadore->name }} {{ $resultadoPreparadore->apellido }} {{ $resultadoPreparadore->apellidoDos }}</span><br>
							<span>{{ $resultadoPreparadore->email }}</span>
						</div>
						<div class="layout-right col-md-3">
							<form action="/user/anadir-preparador" method="POST">
								{{ csrf_field() }}
								<input type="text" name="idPrepa" id="idPrepa" value="{{ $resultadoPreparadore->id }}" hidden>
								<button>Añadir</button>
							</form>
						</div>
					</div>
				@empty
					<span>No se ha añadido ningun preparador</span>	
				@endforelse	
			</div>
		</section>

		<section class="contenido" id="mensajesa">
			<div class="cabezera">
				<span class="icon-cross" id="close-mensajesa"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar cursos">
					<input type="submit" name="buscar" value="Buscar">
				</form>
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
							<span>{{ $mensaje->user->name }} {{ $mensaje->user->apellido }} {{ $mensaje->user->apellidoDos }}</span>
							<button>Enviar</button>
							<button>Leer</button>
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
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar cursos">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>alumnos</h3>
			<div class="box">
				<div class="content-box">
					<ul class="nav nav-tabs" id="videoTab" role="tablist">
						@forelse ($cursosAcademia as $cursoAcademia)
							<li class="nav-item"><a id="{{ $cursoAcademia->oposicione->descripcion }}-tab" href="#{{ $cursoAcademia->oposicione->descripcion }}" data-toggle="tab" role="tab" aria-controls="home" aria-selected="{{ $cursoAcademia->oposicione->descripcion }}">{{ $cursoAcademia->oposicione->descripcion }}</a></li>
						@empty
							<span>No hay cursos disponibles</span>
						@endforelse
					</ul>
					<div class="tab-content" id="videoTabContent">
						@foreach ($cursosAcademia as $cursoAcademia)					
							<div class="tab-pane" id="{{ $cursoAcademia->oposicione->descripcion }}" role="tabpanel" aria-labelledby="{{ $cursoAcademia->oposicione->descripcion }}-tab">
								<div class="container">
									<div class="row">
										@foreach ($alumnos as $alumno)
											@if($alumno->curso_id == $cursoAcademia->id)
											<div class="layout-left col-md-2">
												<img src="{{Storage::disk('public')->url($alumno->user->image )}}" alt="">
											</div>	
											<div class="layout-center col-md-8">
												<span>{{ $alumno->user->name }} {{ $alumno->user->apellido }} {{ $alumno->user->apellidoDos }}</span><br>
												<span>{{ $alumno->user->email }}</span>
											</div>
											<div class="layout-right col-md-2">
												<form action="/user/eliminar-profesor" method="POST">
													{{ csrf_field() }}
													<input type="text" name="idPreparador" id="idPreparador" value="{{$profesore->id }}" hidden>
													<button>Eliminar</button>
												</form>
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

		<section class="add-to-db" id="add-alumnos">
			<span class="icon-cross" id="close-add-alumnos"></span>
		</section>

		<section class="contenido" id="bonosa">
			<div class="cabezera">
				<span class="icon-cross" id="close-bonosa"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar cursos">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>bonos</h3>
			<div class="anadir-curso">
				<span id="new-bonosa">comprar bono</span>
			</div>
		</section>

		<section class="add-to-db" id="add-bonosa">
			<span class="icon-cross" id="close-add-bonosa"></span>
		</section>
	</main>
@endsection