<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @yield('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed:700" rel="stylesheet">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/estilo.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/fonts.css') }}" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    
	<title>@yield('title','TuOposify_home')</title>
</head>
<body>	

        @yield('content')
 
  <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/function.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/responsive.js') }}"></script>
</body>
</html>