<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventario con Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body style="background-image: url('{{asset('inventario.jpg')}}'); background-size: cover; background-repeat: no-repeat;">
        
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" style="color: red;">Inventario con Laravel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        @auth
          <a class="nav-link" href="{{ route('/dashboard') }}">Iniciar Sesión <span class="sr-only">(current)</span></a>
        @else
        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión <span class="sr-only">(current)</span></a>
      </li>
       @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
      </li>
      @endif
    @endauth
  </div>
</nav>
    </body>
</html>
