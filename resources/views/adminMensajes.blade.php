@extends('layouts.admin')

@section('titulo', 'Mensajes')

@section('content')
<div class= "jumbotron">
  <h2>Administración de Mensajes</<h2><br><br>
    <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Lista de mensajes.</h5><br>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Type</th>
          <th scope="col">Column heading</th>
          <th scope="col">Column heading</th>
          <th scope="col">Column heading</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <br><br>
    <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar textos de descripción de mensajes.</h5><br>
    @if(Session::has('SuccessTextoMensajes'))
        <div class="alert alert-dismissible alert-success" style="width:380px">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Hecho! </strong> {!! Session::get('SuccessTextoMensajes') !!}
        </div>
    @endif
    @if(Session::has('ErrorTextoMensajes'))
        <div class="alert alert-dismissible alert-danger" style="width:380px">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error! </strong> {!! Session::get('ErrorTextoMensajes') !!}
        </div>
    @endif
    <button type="button" class="btn btn-info btn-md btnEditTxtEquipo" onclick="editarTextoMensajes()" style="min-width: 200px; margin-bottom:20px">Editar Textos</button>
    <div class="formEditTxtMensajes" style="display:none" >
      <form class="col-sm-12" method="POST" action="/editTextoMensajes">
          <div class="form-group">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <label for="TextoMensajesEs">Texto en español</label>
              <textarea type="textarea" class="form-control" name="TextoMensajesEs" rows="3" style="font-size: 14px;">{{$textos[0]->contactoEs}}</textarea>
              <label for="TextoMensajesEn">Texto en inglés</label>
              <textarea type="textarea" class="form-control" name="TextoMensajesEn" rows="3" style="font-size: 14px;">{{$textos[0]->contactoEn}}</textarea>
          </div>
          <button type="submit" class="btn btn-default">Actualizar</button>
          <a onclick="cancelarMensajes()" class="btn btn-default">Cancelar</a>
      </form>
    </div>
</div>
@endsection
