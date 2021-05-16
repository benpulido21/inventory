@extends('layouts.app3')

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
<div style="background-color: white;"><br>
    <div align="right">
                <a href="{{route('products.create')}}"><button type="button" class="btn btn-success" style="background-color: #004597; border-color: #004597;">Agregar Producto</button></a></div>
              </div><br>
              <!-- /.card-header -->
            
                <table id="products" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Usuario</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Editado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  	@foreach($products as $product)
                     <tr>
                     	<td>{{$product->name}}</td>
                     	<td>{{$product->description}}</td>
                     	<td>${{$product->price}}</td>
                     	<td>{{$product->user->name}}</td>
                     	<td>{{$product->created_at}}</td>
                        <td>{{$product->updated_at}}</td>
                     	<td><a href="{{route('products.edit',$product->id)}}"><button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button></a>&nbsp;<form action="{{ route('products.destroy',$product->id) }}" method="post" class="delete_form" style="margin:  0;display: inline-block;">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="if(!confirm('¿Estas seguro que desea eliminar este producto?')){ return false; }"><i class="fas fa-times"></i></button>
                                    </form></td>
                     </tr>
                     @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Usuario</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Editado</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
            </div>
        </div>
                <script>
  $(function () {
    $("#products").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "pageLength": 4,
       "language": {
            "emptyTable": "Producto no encontrado",
            "lengthMenu": "Mostrar _MENU_ Productos",
            "zeroRecords": "Producto no encontrado",
            "info": "Mostrando _PAGE_ de _PAGES_ páginas",
            "infoEmpty": "No hay productos",
            "infoFiltered": "(Mostrando el total de productos)",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar producto por (fecha,nombre,precio,¿Quien lo subio?):",
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