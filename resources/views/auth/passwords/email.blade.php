@extends('layouts.app')

@section('content')
<main id="reset">
    <header class="header">
		<div id="logo">
			<a href="index.php"><img src="../img/Logo-TuOposify-negro.png" title="logotipo" alt="Logotipo tuOposify"></a>
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

<div class="reset">
        <div class="reset-pssw">
            <h1>{{ __('cambiar contraseña') }}</h1>
            @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

            <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                <label for="email">{{ __('Dirección de correo') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                     @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                        </span>
                     @endif
                        <button type="submit">
                            {{ __('Enviar link de reseteo') }}
                         </button>
                    </form>
        </div>
    </div>
</main>
@endsection
