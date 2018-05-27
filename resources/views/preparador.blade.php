@extends('layouts.app')

@section('title')
	{{$title}}
@endsection

@section('content')
<main id='{{$main}}'>
		<header class="header">
			<img src="{{Storage::disk('public')->url(Auth::user()->image)}}"  class="foto-user">
			<div id="logo">
				<a href="{{ url('/') }}"><img src="img/Logo-TuOposify-negro.png" title="logotipo" alt="Logotipo tuOposify"></a>
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
			<a href="#" id="bonosp-trigger">bonos</a>
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
			<span class="icon-tickets" id="bonos-mobile-trigger"></span>
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

		<section class="contenido" id="cursos">
			<div class="cabezera">
				<span class="icon-cross" id="close-cursos"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar curso">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>cursos</h3>
			<div class="anadir-curso">
				<span id="new-course">añadir curso</span>
			</div>
				<div class="box">
				@forelse ($user->cursos as $curso)
				<div class="content-box">
				<div class="box-header">
					<h4>{{$curso->oposicione->descripcion}}</h4>
					<span>{{ $curso->precio}}€ mes</span>
				</div>
				<div class="box-description">
					<p>{{ $curso->descripcion }}</p>
				</div>
				<div class="box-bottom">
					<a href="">modificar</a>
					<a href="">eliminar</a>
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
			<form action="/user/curso-creado" method="POST">
				{{ csrf_field() }}
				<label for="oposicion">Elegeri el tipo de oposicion</label>
				<select name="oposicion">
				@forelse ($oposiciones as $oposicion)
				<option value="{{ $oposicion->id }}">{{ $oposicion->descripcion }}</option>
				@empty
				<option value="">No hay oposiciones disponibles</option>
				@endforelse
				</select>
				<input type="text" name="preparador" value="{{Auth::user()->id}}" hidden>
				<label for="descripcion">Descripción</label>
				<textarea name="descripcion" id="" cols="30" rows="10"></textarea>
				@if ($errors -> has('descripcion'))
					@foreach ($errors->get('descripcion') as $error)
						<div>{{ $error }}</div>
					@endforeach
				@endif
				<label for="precio">Precio</label>
				<input type="text" name="precio" id="">
				<input type="submit" value="Crear curso" name="crearCurso">
			</form>
			</div>
		</section>

		<section class="contenido" id="video">
			<div class="cabezera">
				<span class="icon-cross" id="close-video"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar clase">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>videos</h3>
			<div class="anadir-curso">
				<span id="new-video">añadir video</span>
			</div>
		</section>

		<section class="add-to-db" id="add-video">
			<span class="icon-cross" id="close-add-video"></span>
		</section>

		<section class="contenido" id="tema">
			<div class="cabezera">
				<span class="icon-cross" id="close-tema"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar clase">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>temas</h3>
			<div class="anadir-curso">
				<span id="new-tema">añadir tema</span>
			</div>
		</section>

		<section class="add-to-db" id="add-tema">
			<span class="icon-cross" id="close-add-tema"></span>
		</section>

		<section class="contenido" id="testp">
			<div class="cabezera">
				<span class="icon-cross" id="close-testp"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar clase">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>tests</h3>
			<div class="anadir-curso">
				<span id="new-testp">añadir test</span>
			</div>
		</section>

		<section class="add-to-db" id="add-testp">
			<span class="icon-cross" id="close-add-testp"></span>
		</section>

		<section class="contenido" id="mensajesp">
			<div class="cabezera">
				<span class="icon-cross" id="close-mensajesp"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar clase">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>mensajes</h3>
			<div class="anadir-curso">
				<span id="new-mensajesp">nuevo mensaje</span>
			</div>
		</section>

		<section class="add-to-db" id="add-mensajesp">
			<span class="icon-cross" id="close-add-mensajesp"></span>
		</section>

		<section class="contenido" id="bonosp">
			<div class="cabezera">
				<span class="icon-cross" id="close-bonosp"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar clase">
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>mensajes</h3>
			<div class="anadir-curso">
				<span id="new-bonosp">nuevo mensaje</span>
			</div>
		</section>

		<section class="add-to-db" id="add-bonosp">
			<span class="icon-cross" id="close-add-bonosp"></span>
		</section>

       
	</main>
@endsection