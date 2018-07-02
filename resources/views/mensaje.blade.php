@extends('layouts.admin')

@section('titulo', 'Mensaje')

@section('content')
<div class= "jumbotron" style="padding-top:40px; padding-bottom:40px">
  <h2>Mensaje de: {{$mensaje[0]->nombre}}</h2><br>
  <h4>{{$mensaje[0]->email}}</h4><br>
  <h5>{{$mensaje[0]->mensaje}}</h5><br>
  <form class="col-sm-12" method="POST" action="/deleteMensaje">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <input type="hidden" class="form-control mb-1" name="idMensaje" value="{{$mensaje[0]->id}}">
    <div style="float:right; margin-bottom:30px">
      <button type="submit" class="btn btn-danger btn-sm" style="min-width: 120px; margin-bottom:20px" onclick="this.disabled=true;this.form.submit()">Eliminar</button>
      <a class="btn btn-success btn-sm" href="/admin/mensajes" style="min-width: 120px; margin-bottom:20px">Responder</a>
      <a class="btn btn-info btn-sm" href="/admin/mensajes" style="min-width: 120px; margin-bottom:20px">Atrás</a>
    </div>
  </form>
</div>
@endsection
