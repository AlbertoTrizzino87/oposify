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
					<div class="block desaparecer">
						<h3>{{$title_home['cuatro']}}</h3>
					</div>
				</div>
				<div class="fila col-12 col-lg-4">
					<div class="block">
						<h3>{{$title_home['dos']}}</h3>
					</div>
					<div class="block">
						<h3>{{$title_home['cinco']}}</h3>
					</div>
				</div>
				<div class="fila col-12 col-lg-4">
					<div class="full-block">
						<h3>{{$title_home['tres']}}</h3>
					</div>
				</div>
			</div>
		</div>


       <section class="contenido" id="clases">
			<div class="cabezera">
				<span class="icon-cross" id="close-clases"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar clase">
					<input type="submit" name="buscar" value="Buscar">
				</form>
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
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar tema">
					<input type="submit" name="buscar" value="Buscar">
				</form>
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
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar apuntes">
					<input type="submit" name="buscar" value="Buscar">
				</form>
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
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar test">
					<input type="submit" name="buscar" value="Buscar">
				</form>
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
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar mensaje">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>mensajes</h3>
			<div class="anadir-curso">
				<span id="new-mensajes">nuevo mensaje</span>
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
				<form action="buscar.php" method="POST">
				<input type="text" name="parametro" placeholder="Buscar entrada">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>diario</h3>
			<div class="anadir-curso">
				<span id="new-diario">añadir entrada</span>
			</div>
			<div class="blog">
				@forelse ($entradas as $entrada)
					<div class="entrada col-md-4">					
						<img src="{{Storage::disk('public')->url($entrada->portada)}}" alt="">
						<h4>{{ $entrada->titulo }}</h4>
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
				<form action="/buscar" method="GET">
				<input type="text" name="parametro" placeholder="Buscar preparador,academia u oposición">
				<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<div class="resultados">
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
	</main>
@endsection