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
          <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('fontawesome-free/css/all.min.css')}}">
  <script src="{{asset('jquery/jquery.min.js')}}"></script>
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
          <a class="nav-link" href="{{ route('dashboard') }}">Inicio<span class="sr-only">(current)</span></a>
      </li>
      @if(Auth::user()->role == "Administrador")
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">Productos</a>
      </li>
      <form method="POST" action="{{ route('logout') }}">
                    @csrf
         <button type="submit" class="btn btn-danger"><i class="fas fa-door-open"></i>&nbsp;Cerrar Sesión</button>
                </form>
  </div>
</nav><br>
<div class="mx-auto col-md-8" style="background-color: white;">
     @yield('content')
</div>
  <!-- DataTables  & Plugins -->
  <!-- jQuery -->
<script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    </body>
</html>
