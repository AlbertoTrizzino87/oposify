@extends('layouts.app')

@section('content')

<main id="register">

    <header class="header">
			<div id="logo" class="logo">
				<a href="index.php"><img src="img/Logo-TuOposify-negro.png" title="logotipo" alt="Logotipo tuOposify"></a>
			</div>
			<span class="icon-hamburguesa" id="trigger-home"></span>
    </header>
    
    <nav class="nav">
        <div class="botones">
            <a href="{{ route('register') }}" id="signup-trigger">{{ __('Registrate') }}</a>
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

    <div class="signup-container">
        <div class="signup">
        <h1>{{ __('Registrate') }}</h1>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <select name="role" id="form-trigger">
                            <option value="Academia">Academia</option>
				            <option value="Preparador">Preparador</option>
                            <option value="Opositor">Opositor</option>     
                        </select>

                         @if ($errors->has('role'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('role') }}</strong>
                            </span>
                        @endif
                        
                        <input id="name" type="text"  name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        
                         <input id="apellido" type="text" style="display:none;"  name="apellido" value="{{ old('apellido') }}" class="escondido" placeholder="Primer Apellido">
                                @if ($errors->has('apellido'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif

                         <input id="apellidoDos" type="text" style="display:none;"  name="apellidoDos" value="{{ old('apellidoDos') }}" class="escondido" placeholder="Segundo Apellido">
                                @if ($errors->has('apellidoDos'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('apellidoDos') }}</strong>
                                    </span>
                                @endif

                        <input id="telefono" type="text"  name="telefono" value="{{ old('telefono') }}" placeholder="Telefono">
                        @if ($errors->has('telefono'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </span>
                        @endif

                        <input id="ciudad" type="text"  name="ciudad" value="{{ old('ciudad') }}" placeholder="Ciudad">

                        <input id="direccion" type="text"  name="direccion" value="{{ old('direccion') }}" placeholder="Dirección">
           
                         <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="correo" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        <input id="password" type="password"  name="password" placeholder="Contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        <input id="password-confirm" type="password"  name="password_confirmation"  placeholder="Repetir Contraseña" required><br>

                        <label for="image">Subir foto de perfil</label><br>

                        <input type="file" name="image" class="form-control-file" id="image">
                            
                        <button type="submit">
                             {{ __('Registrate') }}
                        </button>
                    </form>
            </div>
        </div>
    </main>
@endsection
