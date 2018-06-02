<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/estilo.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/fonts.css') }}" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Social Network</title>
</head>
<body>
    <main class="social">
        <header>
            <div class="logo">
                <a href="{{ url('/user') }}"><img src="../../img/Logo-TuOposify-blanco.png" title="logotipo" alt="Logotipo tuOposify"></a> 
            </div>
            <form action="/red-social/buscar-usuario" method="GET">
				<input type="text" name="parametro" placeholder="Buscar usuario">
				<input type="submit" name="buscar2" value="Buscar">
			</form>

            <div class="personal-imagen">
            <a href="/user/red-social/{{ Auth::user()->id }}"><img src="{{Storage::disk('public')->url(Auth::user()->image)}}"  alt=""></a>
			</div>
        </header>

        @yield('contenido-social')
    </main>
</body>
</html>