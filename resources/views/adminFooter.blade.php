@extends('layouts.admin')

@section('titulo', 'Pie de Página')

@section('content')
<div class= "jumbotron" style="padding-top:40px; padding-bottom:40px">
  <h2>Administración del Pie de Página</h2><br>
  <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar vínculos.</h5><br>
  @if(Session::has('SuccessVinculo'))
      <div class="alert alert-dismissible alert-success" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Hecho! </strong> {!! Session::get('SuccessVinculo') !!}
      </div>
  @endif
  @if(Session::has('ErrorVinculo'))
      <div class="alert alert-dismissible alert-danger" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error! </strong> {!! Session::get('ErrorVinculo') !!}
      </div>
  @endif
  <button type="button" class="btn btn-success btn-md btnAddVinculo" onclick="agregarVinculo()" style="min-width: 200px; margin-bottom:20px">Agregar Vinculo</button>
  <button type="button" class="btn btn-info btn-md btnEditVinculo" onclick="editarVinculo({{$vinculos}})" style="min-width: 200px; margin-bottom:20px">Editar Vinculo</button>
  <button type="button" class="btn btn-danger btn-md btnDeleteVinculo" onclick="eliminarVinculo({{$vinculos}})" style="min-width: 200px; margin-bottom:20px">Eliminar Vinculo</button>
  <div class="formAddVinculo" style="display:none" >
    <form class="col-sm-12" method="POST" action="/addVinculo">
        <div class="form-group" style="margin-bottom:0px">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="row">
            <div class="col-xl-4">
              <input  class="form-control mb-1" name="NombreAddVinculo"  placeholder="Nombre del vínculo">
              <input  class="form-control mb-1" name="VinculoAddVinculo"  placeholder="Enlace del vínculo">
            </div>
          </div>
          <label for="IconoAddVinculo" style="margin:5px;float:left">Icono</label>
          <select class="form-control" id="IconoAddVinculo" name="IconoAddVinculo" style="width:80px; float:left; font-family:'FontAwesome'">
            <option value="fa-facebook">&#xf09a;</option>
            <option value="fa-instagram">&#xf16d;</option>
            <option value="fa-linkedin">&#xf0e1;</option>
            <option value="fa-twitter">&#xf099;</option>
            <option value="fa-link">&#xf0c1;</option>
          </select><br>
        </div>
        <br><button type="submit" class="btn btn-default" style="margin-top:0px" onclick="this.disabled=true;this.form.submit()">Agregar</button>
        <a onclick="cancelarFooter()" class="btn btn-default" style="margin-top:0px">Cancelar</a>
    </form>
  </div>
  <div class="formEditVinculo" style="display:none" >
    <form class="col-sm-12" method="POST" action="/editVinculo">
        <div class="form-group">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="row">
              <div class="col-xl-4">
                <label for="SelEditServicios">Seleccione el vínculo que desea editar</label>
                <select onchange="llenarEditVinculo({{$vinculos}})" class="form-control" id="SelEditVinculo" name="SelEditVinculo"></select>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-4">
                <label for="NombreEditVinculo">Nombre del vínculo</label>
                <input  class="form-control mb-1" name="NombreEditVinculo" id="NombreEditVinculo">
                <label for="VinculoEditVinculo">Enlace del vínculo</label>
                <input  class="form-control mb-1" name="VinculoEditVinculo" id="VinculoEditVinculo">
              </div>
            </div>
            <label for="IconoEditVinculo" style="margin:5px;float:left">Icono</label>
            <select class="form-control" id="IconoEditVinculo" name="IconoEditVinculo" style="width:80px; float:left; font-family:'FontAwesome'">
              <option value="fa-facebook">&#xf09a;</option>
              <option value="fa-instagram">&#xf16d;</option>
              <option value="fa-linkedin">&#xf0e1;</option>
              <option value="fa-twitter">&#xf099;</option>
              <option value="fa-link">&#xf0c1;</option>
            </select>
        </div>
        <br><button type="submit" class="btn btn-default" style="margin-top:8px">Actualizar</button>
        <a onclick="cancelarFooter()" class="btn btn-default" style="margin-top:8px">Cancelar</a>
    </form>
  </div>
  <div class="formDeleteVinculo" style="display:none" >
    <form class="col-sm-12" method="POST" action="/deleteVinculo">
        <div class="form-group">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="row">
              <div class="col-xl-4">
                <label for="SelDeleteVinculo">Seleccione el vínculo que desea eliminar</label>
                <select class="form-control" id="SelDeleteVinculo" name="SelDeleteVinculo"></select>
              </div>
            </div>
        </div>
        <br><button type="submit" class="btn btn-default" style="margin-top:8px" onclick="this.disabled=true;this.form.submit()">Eliminar</button>
        <a onclick="cancelarFooter()" class="btn btn-default" style="margin-top:8px">Cancelar</a>
    </form>
  </div>

  <br><br>
  <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administración de los datos de contacto.</h5><br>
  @if(Session::has('SuccessDatos'))
      <div class="alert alert-dismissible alert-success" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Hecho! </strong> {!! Session::get('SuccessDatos') !!}
      </div>
  @endif
  @if(Session::has('ErrorDatos'))
      <div class="alert alert-dismissible alert-danger" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error! </strong> {!! Session::get('ErrorDatos') !!}
      </div>
  @endif
  <button type="button" class="btn btn-info btn-md btnEditDatos" onclick="editarDatos()" style="min-width: 200px; margin-bottom:20px">Editar Datos</button>
  <div class="formEditDatos" style="display:none">
    <form class="col-sm-12" method="POST" action="/editDatos">
      <div class="form-group" style="margin-bottom:0px">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <label for="TelefonoEditDatos">Teléfono de la empresa</label>
        <input  class="form-control mb-1" name="TelefonoEditDatos" id="TelefonoEditDatos" style="width:300px" @if(count($datos)>0) value="{{$datos[0]->telefono}}" @endif>
        <label for="DireccionEditDatos">Dirección de la empresa</label>
        <input  class="form-control mb-1" name="DireccionEditDatos" id="DireccionEditDatos" style="width:300px" @if(count($datos)>0) value="{{$datos[0]->direccion}}" @endif>
      </div>
      <br><button type="submit" class="btn btn-default" style="margin-top:0px">Actualizar</button>
      <a onclick="cancelarFooter()" class="btn btn-default" style="margin-top:0px">Cancelar</a>
    </form>
  </div>
</div>
@endsection
