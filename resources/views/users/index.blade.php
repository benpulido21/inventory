@extends('layouts.app2')

@section('content')
<br>
@if(Session::has('success'))
            <div class="alert alert-success" >
                {{Session::get('success')}}
            </div>

            <script type="text/javascript">
                setTimeout(function(){
                    $('.alert').hide();
                    $('.active_table').attr('class', ' ');
                }, 5000);
            </script>
        @endif
        @if(Auth::user()->role != "Administrador")
          <script type="text/javascript">
            alert('No tiene permiso para acceder a este modulo!');
            window.location.href='dashboard';
          </script>
        @endif
<div style="background-color: white;"><br>
    <div align="right">
                <a href="{{route('users.create')}}"><button type="button" class="btn btn-success" style="background-color: #004597; border-color: #004597;">Agregar Usuario</button></a></div>
              </div><br>
              <!-- /.card-header -->
            
                <table id="users" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($users as $user)
                     <tr>
                     	<td>{{$user->name}}</td>
                     	<td>{{$user->email}}</td>
                     	<td>{{$user->role}}</td>
                     	<td><a href="{{route('users.edit',$user->id)}}"><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></a>&nbsp;@if($user->email != "benpulido6@gmail.com")<form action="{{ route('users.destroy',$user->id) }}" method="post" class="delete_form" style="margin:  0;display: inline-block;">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="if(!confirm('¿Estas seguro que desea eliminar este usuario?')){ return false; }"><i class="fas fa-times"></i></button>
                                    </form>@endif</td>
                     </tr>
                     @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
            </div>
        </div>
                <script>
  $(function () {
    $("#users").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "pageLength": 4,
       "language": {
            "emptyTable": "Usuario no encontrado",
            "lengthMenu": "Mostrar _MENU_ Usuarios",
            "zeroRecords": "Usuario no encontrado",
            "info": "Mostrando _PAGE_ de _PAGES_ páginas",
            "infoEmpty": "No hay usuarios",
            "infoFiltered": "(Mostrando el total de usuarios)",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar Usuario:",
            "paginate": {
        "first":      "Primero",
        "last":       "Ùltimo",
        "next":       "Siguiente",
        "previous":   "Anterior"
    },
          }
  });
  });
</script>

@endsection