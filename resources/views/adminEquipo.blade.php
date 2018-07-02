@extends('layouts.admin')

@section('titulo', 'Equipo')

@section('content')
<div class= "jumbotron" style="padding-top:40px; padding-bottom:40px">
  <h2>Administración de Equipo</h2><br>
    <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar miembros del equipo.</h5><br>
    @if(Session::has('SuccessEquipo'))
        <div class="alert alert-dismissible alert-success" style="width:380px">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Hecho! </strong> {!! Session::get('SuccessEquipo') !!}
        </div>
    @endif
    @if(Session::has('ErrorEquipo'))
        <div class="alert alert-dismissible alert-danger" style="width:380px">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error! </strong> {!! Session::get('ErrorEquipo') !!}
        </div>
    @endif
    <button type="button" class="btn btn-success btn-md btnAddEquipo" onclick="agregarEquipo()" style="min-width: 200px; margin-bottom:20px">Agregar Miembro</button>
    <button type="button" class="btn btn-info btn-md btnEditEquipo" onclick="editarEquipo({{$equipo}})" style="min-width: 200px; margin-bottom:20px">Editar Miembro</button>
    <button type="button" class="btn btn-danger btn-md btnDeleteEquipo" onclick="eliminarEquipo({{$equipo}})" style="min-width: 200px; margin-bottom:20px">Eliminar Miembro</button>
    <div class="formAddEquipo" style="display:none" >
      <form class="col-sm-12" method="POST" action="/addEquipo">
          <div class="form-group" style="margin-bottom:0px">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <div class="row">
                <div class="col-xl-3">
                  <input  class="form-control mb-1" name="NombreAddEquipo"  placeholder="Nombre del miembro del equipo" >
                </div>
              </div>
              <div class="row">
                <div class="col-xl-3">
                  <input  class="form-control mb-1" name="CargoAddEquipoEs"  placeholder="Cargo del miembro en español" >
                </div>
                <div class="col-xl-3">
                  <input  class="form-control mb-1" name="CargoAddEquipoEn"  placeholder="Cargo del miembro en inglés" >
                </div>
              </div>
              <div class="row">
                <div class="col-xl-3">
                  <input  class="form-control mb-1" name="CorreoAddEquipo"  placeholder="Email del miembro del equipo" >
                </div>
              </div>
          </div>
          <br><button type="submit" class="btn btn-default" style="margin-top:0px" onclick="this.disabled=true;this.form.submit()">Agregar</button>
          <a onclick="cancelarEquipo()" class="btn btn-default" style="margin-top:0px">Cancelar</a>
      </form>
    </div>
    <div class="formEditEquipo" style="display:none" >
      <form class="col-sm-12" method="POST" action="/editEquipo">
          <div class="form-group" style="margin-bottom:0px">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <div class="row">
                <div class="col-xl-3">
                  <label for="SelEditServicios">Seleccione el miembro del equipo que desea editar</label>
                  <select onchange="llenarEditEquipo({{$equipo}})" class="form-control" id="SelEditEquipo" name="SelEditEquipo"></select>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-3">
                  <label for="NombreEditEquipo">Nombre del miembro del equipo</label>
                  <input  class="form-control mb-1" name="NombreEditEquipo" id="NombreEditEquipo">
                </div>
              </div>
              <div class="row">
                <div class="col-xl-3">
                  <label for="CargoEditEquipoEs">Cargo del miembro del equipo en español</label>
                  <input  class="form-control mb-1" name="CargoEditEquipoEs" id="CargoEditEquipoEs">
                </div>
                <div class="col-xl-3">
                  <label for="CargoEditEquipoEn">Cargo del miembro del equipo en inglés</label>
                  <input  class="form-control mb-1" name="CargoEditEquipoEn" id="CargoEditEquipoEn">
                </div>
              </div>
              <div class="row">
                <div class="col-xl-3">
                  <label for="CorreoEditEquipo">Email del miembro del equipo</label>
                  <input  class="form-control mb-1" name="CorreoEditEquipo" id="CorreoEditEquipo">
                </div>
              </div>
          </div>
          <br><button type="submit" class="btn btn-default" style="margin-top:0px">Actualizar</button>
          <a onclick="cancelarEquipo()" class="btn btn-default" style="margin-top:0px">Cancelar</a>
      </form>
    </div>
    <div class="formDeleteEquipo" style="display:none" style="margin-bottom:0px">
      <form class="col-sm-12" method="POST" action="/deleteEquipo">
          <div class="form-group">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <div class="row">
                <div class="col-xl-3">
                  <label for="SelDeleteEquipo">Seleccione el miembro del equipo que desea eliminar</label>
                  <select class="form-control" id="SelDeleteEquipo" name="SelDeleteEquipo"></select>
                </div>
              </div>
          </div>
          <br><button type="submit" class="btn btn-default" style="margin-top:8px" onclick="this.disabled=true;this.form.submit()">Eliminar</button>
          <a onclick="cancelarEquipo()" class="btn btn-default" style="margin-top:8px">Cancelar</a>
      </form>
    </div>

    <br><br>
    <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar textos de descripción del equipo.</h5><br>
    @if(Session::has('SuccessTextoEquipo'))
        <div class="alert alert-dismissible alert-success" style="width:380px">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Hecho! </strong> {!! Session::get('SuccessTextoEquipo') !!}
        </div>
    @endif
    @if(Session::has('ErrorTextoEquipo'))
        <div class="alert alert-dismissible alert-danger" style="width:380px">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Error! </strong> {!! Session::get('ErrorTextoEquipo') !!}
        </div>
    @endif
    <button type="button" class="btn btn-info btn-md btnEditTxtEquipo" onclick="editarTextoEquipo()" style="min-width: 200px; margin-bottom:20px">Editar Textos</button>
    <div class="formEditTxtEquipo" style="display:none" >
      <form class="col-sm-12" method="POST" action="/editTextoEquipo">
          <div class="form-group">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <label for="TextoEquipoEs">Texto en español</label>
              <textarea type="textarea" class="form-control" name="TextoEquipoEs" rows="3" style="font-size: 14px;">{{$textos[0]->equipoEs}}</textarea>
              <label for="TextoEquipoEn">Texto en inglés</label>
              <textarea type="textarea" class="form-control" name="TextoEquipoEn" rows="3" style="font-size: 14px;">{{$textos[0]->equipoEn}}</textarea>
          </div>
          <button type="submit" class="btn btn-default">Actualizar</button>
          <a onclick="cancelarEquipo()" class="btn btn-default">Cancelar</a>
      </form>
    </div>
</div>
@endsection
