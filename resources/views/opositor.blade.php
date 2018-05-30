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
        </section>

		<section class="add-to-db" id="add-diario">
			<span class="icon-cross" id="close-add-diario"></span>
		</section>

		<section class="contenido" id="buscar">
			<div class="cabezera">
				<span class="icon-cross" id="close-buscar"></span>
				<form action="/buscar" method="GET">
				<input type="text" name="parametro" placeholder="Buscar">
				<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<div class="resultados">
					@forelse ($resultados as $resultado)
						<div class="busqueda-layout">
						 	<div>
							 	<div class="layout-left">
							 		<img src="{{Storage::disk('public')->url($resultado->user->image)}}" alt="">
								 	@if (empty($resultado->user->apellido))
								 	<span>{{ $resultado->user->name }}</span>
								 	@elseif (empty($resultado->user->apellidoDos))
								 	<span>{{ $resultado->user->name }} {{ $resultado->user->apellido }}</span>
								 	@else 
								 	<span>{{ $resultado->user->name }} {{ $resultado->user->apellido }} {{ $resultado->user->apellidoDos }}</span>
								 	@endif
								</div>
								<div class="layout-center">
									<h5>{{ $resultado->oposicione->descripcion }}</h5>
									<p>{{ $resultado->descripcion }}</p>
								</div>
								<div class="layout-right">
									<span>{{ $resultado->precio }}</span>
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
						</div>
					@empty
						
					@endforelse
				</div>
        </section>
	</main>
@endsection