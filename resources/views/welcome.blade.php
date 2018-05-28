@extends('layouts.app')

@section('meta')
<meta name="description" content="Oposify es una plataforma que pone en contacto academias,preparadores y opositores y que mejorando el flujo de información">
<meta name="keywords" content="preparar una oposición,oposición,academias,preparadores">
<meta name="robots" content="index,follow">
<meta property="og:title" content="Oposify" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://entregas.albertotrizzino.com" />
<meta name="twitter:card" content="summary"></meta>
<meta name=“twitter:url” content=“http://entregas.albertotrizzino.com”>
<meta name=“twitter:title” content=“Oposify”>
<meta name=“twitter:description” content="Oposify es una plataforma que pone en contacto academias,preparadores y opositores y que mejorando el flujo de información">


@endsection

@section('content')
<main id="home">
    <header class="header">
			<div id="logo" class="logo">
				<a href="{{ url('/') }}"><img src="img/Logo-TuOposify-negro.png" title="logotipo" alt="Logotipo tuOposify"></a>
			</div>
			<span class="icon-hamburguesa" id="trigger-home"></span>
		</header>

		<nav class="nav">
			<div class="botones">
			<a href="" id="about-trigger2">¿que es tuoposify?</a>
			<a href="{{ route('register') }}" id="signup-trigger">{{ __('Registrate') }}</a>
			@guest
			<a href="{{ route('login') }}" id="login-trigger">{{ __('Acceder') }}</a>
			@else
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Mi perfil') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
			@endguest
			</div>
		</nav>

		<div class="menu-mobile">
		<a href="" id="about-trigger" class="link">¿que es tuoposify?</a>
			<a href="{{ route('register') }}" id="signup-trigger" class="link">{{ __('Registrate') }}</a>
			@guest
			<a href="{{ route('login') }}" id="login-trigger" class="link">{{ __('Acceder') }}</a>
			@else
			<a id="navbarDropdown" class="nav-link dropdown-toggle link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Mi perfil') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
			@endguest
		</div>

		<section id="about">
			<span class="icon-cross" id="close-about"></span>
			<h3>¿Que es tuoposify?</h3>
			<p>Oposify nace para llevar el estudio de las oposiciones al mundo digital. Hemos creado una plataforma que permite conectar academias, preparadores y opositores de todo el país para que el flujo de información sea lo más cómodo posible.</p>
			<h5>Academias</h5>
			<p>Si eres una academia tendrás a tu disposición una herramienta muy potente para gestionar todos tus alumnos y profesores, además de poder ponerte en contacto con ellos con un simple click.
				En Oposify encontrarás la oportunidad de llegar a estudiantes de toda España y aumentar tu visibilidad.</p>
			<h5>Preparadores</h5>
			<p>Si eres un preparador a quien le gustan las nuevas tecnologías entonces esta es la plataforma que estabas buscando. Podrás subir los videos de tus clases y ponerlos a disposición de tus estudiantes. Por supuesto, tus alumnos también podrán acceder al temario, los apuntes e incluso los tests preparatorios. </p>
			<h5>Opositores</h5>
			<p>De la misma manera podrás disfrutar de clases grabadas en vídeo y de un temario siempre actualizado, un contacto directo con tu preparador y un espacio personal para organizar tu estudio.</p><br><br>
			<p>Nuestro objetivo es transformar la enseñanza de las oposiciones y hacerla más transparente a través de juicios y comentarios que eleven el nivel de la oferta y que permitan a los demandantes elegir teniendo como referencia a otros usuarios que ya han pasado per el mismo camino. <br><br>
			En Oposify sabemos de lo que hablamos porque lo hemos sufrido. Y hemos intercambiado ideas con muchos otros que también han estado allí. Y está claro: en muchas ocasiones quien decide empezar a estudiar una oposición no es consciente de todas las dificultades que pueden surgir durante el camino; y no tenía por qué saberlo. Hasta ahora. Por esa razón queremos crear una comunidad que permita ahorrarnos tiempo, dinero y mala decisiones. <br><br>
			Si has decidido empezar con una oposición, búscala en nuestra plataforma, elige el mejor preparador y ya estás listo para empezar. A partir de entonces, todo dependerá de ti.</p>
			<p>MUCHA SUERTE A TODOS!</p>
		</section>

		<section id="icons">
			<span class="icon-lupa" id="search-trigger"></span>
			<div class="social-network">
				<span class="icon-facebook"></span>
				<span class="icon-instagram"></span>
				<span class="icon-twitter"></span>
			</div>
		</section>

		<section id="banner">
			<div class="caja">
			<h2>Tuoposify</h2>
			<h1>preparar una oposición nunca ha sido tan facil</h1>
			<form action="search1">
				<input type="text" name="parametro1" placeholder="Buscar academia, preparador o oposición" autofocus>
				<input type="submit" name="buscar-ahora" value="Busca ahora">
			</form>
			</div>
		</section>

		<section class="contenido-global" id="search">
			<div class="cabezera">
				<span class="icon-cross" id="close-search"></span>
				<form action="buscar.php" method="POST">
					<input type="text" name="parametro" placeholder="Buscar academia, preparador o oposición" autofocus>
					<input type="submit" name="buscar" value="Buscar">
				</form>
			</div>
			<h3>oposiciones</h3>
        </section>
    </main>
    @endsection

