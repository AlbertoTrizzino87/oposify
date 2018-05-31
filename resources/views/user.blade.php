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
			<div class="anadir-curso">
				<span id="new-cursosa">añadir curso</span>
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
							<form action="/user/entrada-creada" method="POST">
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
		</section>

		<section class="add-to-db" id="add-mensajesa">
			<span class="icon-cross" id="close-add-mensajesa"></span>
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
			<div class="anadir-curso">
				<span id="new-alumnos">añadir alumno</span>
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