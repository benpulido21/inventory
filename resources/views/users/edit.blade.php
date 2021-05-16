@extends('layouts.app2')

@section('content')
<script>
  function soloLetras(e) {
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
      especiales = [8, 37, 39, 46],
      tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
</script>
  @if(Auth::user()->role != "Administrador")
          <script type="text/javascript">
            alert('No tiene permiso para acceder a este modulo!');
            window.location.href='dashboard';
          </script>
        @endif
<div style="background-color: white;"><br>
  <form id="user" name="user" method="post" action="{{route('users.update',$user->id)}}">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
   <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Introduzca su nombre" required onkeypress="return soloLetras(event);" pattern="[A-Z a-z]+" title="El nombre debe contener solo letras" value="{{$user->name}}">
                  </div>
                   <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca su Correo Electrónico" required value="{{$user->email}}">
                  </div>
                  <div class="form-group">
                    <label for="rol">Rol</label>
                    <select class="form-control" name="role" id="role" required>
                       <option value="">Seleccione rol...</option>
                       @if($user->role == "Administrador")
                       <option value="Administrador" selected>Administrador</option>
                       <option value="Almacen">Almacen</option>
                       @else
                       <option value="Administrador">Administrador</option>
                       <option value="Almacen" selected>Almacen</option>
                       @endif
                    </select>
                  </div>
                  <div align="center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </div><br>
                </form>
</div>

@endsection