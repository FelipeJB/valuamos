@extends('layouts.admin')

@section('titulo', 'Inicio')

@section('content')
<div class= "jumbotron" style="padding-top:40px; padding-bottom:40px">
  <h2>Administración del Inicio</h2><br>
  <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar textos de inicio ubicados bajo el nombre de la empresa.</h5><br>
  @if(Session::has('SuccessTextoInicio'))
      <div class="alert alert-dismissible alert-success" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Hecho! </strong> {!! Session::get('SuccessTextoInicio') !!}
      </div>
  @endif
  @if(Session::has('ErrorTextoInicio'))
      <div class="alert alert-dismissible alert-danger" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error! </strong> {!! Session::get('ErrorTextoInicio') !!}
      </div>
  @endif
  <button type="button" class="btn btn-info btn-md btnEditTxtInicio" onclick="editarTextoInicio()" style="min-width: 200px; margin-bottom:20px">Editar Textos</button>
  <div class="formEditTxtInicio" style="display:none" >
    <form class="col-sm-12" method="POST" action="/editTextoInicio">
        <div class="form-group">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <label for="TextoInicioEs">Texto en español</label>
            <textarea type="textarea" class="form-control" name="TextoInicioEs" rows="3" style="font-size: 14px;">{{$textos[0]->inicioEs}}</textarea>
            <label for="TextoInicioEn">Texto en inglés</label>
            <textarea type="textarea" class="form-control" name="TextoInicioEn" rows="3" style="font-size: 14px;">{{$textos[0]->inicioEn}}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Actualizar</button>
        <a onclick="cancelarInicio()" class="btn btn-default">Cancelar</a>
    </form>
  </div>

  <br><br>
  <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar contraseña de acceso.</h5><br>
  @if(Session::has('SuccessPassword'))
      <div class="alert alert-dismissible alert-success" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Hecho! </strong> {!! Session::get('SuccessPassword') !!}
      </div>
  @endif
  @if(Session::has('ErrorPassword'))
      <div class="alert alert-dismissible alert-danger" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error! </strong> {!! Session::get('ErrorPassword') !!}
      </div>
  @endif
  <button type="button" class="btn btn-info btn-md btnEditPassword" onclick="cambiarClave()" style="min-width: 200px; margin-bottom:20px">Editar Contraseña</button>
  <div class="formEditPassword" style="display:none" >
    <form class="col-sm-12" method="POST" action="/passwordUpdate">
        <div class="form-group">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="password" class="form-control mb-1" name="ca"  placeholder="Contraseña Actual" style="width:300px">
            <input type="password" class="form-control mb-1" name="cn"  placeholder="Contraseña Nueva" style="width:300px">
            <input type="password" class="form-control mb-1" name="ccn" placeholder="Contraseña Contraseña Nueva" style="width:300px">
        </div>
        <button type="submit" class="btn btn-default">Actualizar</button>
        <a onclick="cancelarInicio()" class="btn btn-default">Cancelar</a>
    </form>
  </div>
</div>
@endsection
