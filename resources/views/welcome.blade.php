@extends('layouts.app')

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
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias ipsum pariatur quis accusantium! Eum doloremque, aperiam eius quisquam illum veniam delectus recusandae repellendus reprehenderit sequi. Doloribus repellendus corporis aut laborum placeat atque iure, veritatis illum consequatur voluptas quasi tempora nemo iste voluptatem, quos? Deleniti enim porro, cupiditate veritatis suscipit voluptatum necessitatibus id. Autem id reprehenderit laborum omnis libero error sint at eaque, est itaque officia adipisci provident similique facilis porro commodi ad voluptatum fuga impedit saepe. Doloremque obcaecati reiciendis repudiandae, ad nulla eveniet saepe autem totam, facilis veniam suscipit ea praesentium corporis consectetur odio aut qui incidunt quas vel quibusdam.</p>
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

