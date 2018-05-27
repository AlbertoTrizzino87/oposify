@extends('layouts.app')

@section('content')
<main id=login>
    <header class="header">
			<div id="logo">
				<a href="index.php"><img src="img/Logo-TuOposify-negro.png" title="logotipo" alt="Logotipo tuOposify"></a>
			</div>
			<span class="icon-hamburguesa" id="trigger-home"></span>
		</header>

    <nav class="nav">
        <div class="botones">
			<a href="{{ route('register') }}" id="">{{ __('Registrate') }}</a>
            <a href="{{ route('login') }}" id="login-trigger">{{ __('Acceder') }}</a>
        </div>
    </nav>

    <div class="menu-mobile">
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
        
    <div class="login-container">
    <div class="login">
         <h1>{{ __('Acceder') }}</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                 <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="Correo" required autofocus><br>
                        @if ($errors->has('email'))
                             <span class="invalid-feedback">
                                 <strong>{{ $errors->first('email') }}</strong>
                             </span>
                         @endif
                 <input id="password" type="password"  name="password" placeholder="Contraseña" required><br>
                         @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                <div class="mantener">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span> {{ __('Mantener session') }}<span><br>
                </div>
                <div class="darle-boton">
                <button type="submit" class="boton-acceder">
                     {{ __('Acceder') }}
                </button>
                <a class="pss-olvidada" href="{{ route('password.request') }}">
                     {{ __('¿Contraseña olvidada?') }}
                 </a>
                </div>
              </form>
            </div>
         </div>
<main>
@endsection
