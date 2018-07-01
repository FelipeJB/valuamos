@extends('layouts.admin')

@section('titulo', 'Panel')

@section('content')
<div class= "container">
  <div class= "jumbotron text-center">
    <h2>Panel de Administración</h2><br>
    <h5>En esta sección podrá administrar el contenido que se muestra en cada componente de la página web. Ingrese a las opciones de administración o regrese a la página web para consultar los cambios.</h5>
    <br>
    <div class="row">
      <div class="col-md-3" >
      </div>
      <div class="col-md-3" >
        <a class="btn btn-info btn-lg" href="#" onclick="document.getElementById('menu-toggle').click()" style="min-width: 200px; margin-bottom:20px">Administración</a>
      </div>
      <div class="col-md-3" >
        <a class="btn btn-info btn-lg" href="/" style="min-width: 200px; margin-bottom:20px">Página Web</a>
      </div>
      <div class="col-md-3" >
      </div>
    </div>
  </div>
</div>
@endsection
