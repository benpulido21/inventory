@extends('layouts.app2')

@section('content')
<script type="text/javascript">

  function soloNumeros(e){

    var key = window.Event ? e.which : e.keyCode
    //alert(key);
    return ((key >= 48 && key <= 57) || (key==8) || (key==0) || (key == 46))
  }

</script>
<div style="background-color: white;"><br>
  <form id="product" name="product" method="post" action="{{route('products.update',$product->id)}}">
    @csrf
    <input name="_method" type="hidden" value="PATCH">
   <div class="form-group">
                    <label for="name">Nombre del producto</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Introduzca nombre del producto" required value="{{$product->name}}">
                  </div>
                   <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Introduzca precio del producto ejemplo: 2.5" required onkeypress="return soloNumeros(event);" value="{{$product->price}}">
                  </div>
                   <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" required class="form-control">{{$product->description}}</textarea>
                  </div>
                  <div align="center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </div><br>
                </form>
</div>

@endsection