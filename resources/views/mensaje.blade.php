@extends('layouts.admin')

@section('titulo', 'Mensaje')

@section('content')
<div class= "jumbotron" style="padding-top:40px; padding-bottom:40px">
  <div class="row">
    <div class="col-md-6">
      <h2>Mensaje de: {{$mensaje[0]->nombre}}</h2><br>
      <h4>{{$mensaje[0]->email}}</h4><br>
      <h5>{{$mensaje[0]->mensaje}}</h5><br>
      <form class="col-sm-12" method="POST" action="/deleteMensaje">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" class="form-control mb-1" name="idMensaje" value="{{$mensaje[0]->id}}">
        <div style="float:right;">
          <button type="submit" class="btn btn-danger btn-sm" style="min-width: 120px; margin-bottom:20px" onclick="this.disabled=true;this.form.submit()">Eliminar</button>
          <button type="button" class="btn btn-success btn-sm" style="min-width: 120px; margin-bottom:20px" onclick="responderMensaje()">Responder</button>
          <a class="btn btn-info btn-sm" href="/admin/mensajes" style="min-width: 120px; margin-bottom:20px">Atrás</a>
        </div>
      </form>
    </div>
    <div class="col-md-6 formResponderMensaje" style="display:none">
      <h3>De: {{config('mail.username', 'valuamos@vaulamos.com')}}</h3><br>
      <h4>Para: {{$mensaje[0]->email}}</h4><br>
      <form class="col-sm-12" method="POST" action="/responderMensaje">
          <div class="form-group" style="margin-bottom:0px">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" class="form-control mb-1" name="RemitenteMensaje" value="{{$mensaje[0]->email}}">
            <label for="AsuntoMensaje">Asunto del Mensaje</label>
            <input  class="form-control mb-1" name="AsuntoMensaje" id="AsuntoMensaje">
            <label for="Mensaje">Mensaje</label>
            <textarea type="textarea" class="form-control" name="Mensaje" id="Mensaje" rows="7" style="font-size: 16px; margin-bottom:5px"></textarea>
          </div>
          <br><button type="submit" class="btn btn-default" style="margin-top:0px" onclick="this.disabled=true;this.form.submit()">Responder</button>
          <a onclick="cancelarMensaje()" class="btn btn-default" style="margin-top:0px">Cancelar</a>
      </form>
    </div>
  </div>

</div>
@endsection
