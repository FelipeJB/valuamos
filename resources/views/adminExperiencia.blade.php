@extends('layouts.admin')

@section('titulo', 'Experiencia')

@section('content')
<div class= "jumbotron" style="padding-top:40px; padding-bottom:40px">
  <h2>Administración de Experiencia</h2><br>

<h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar elementos de experiencia.</h5><br>
@if(Session::has('SuccessExperiencia'))
    <div class="alert alert-dismissible alert-success" style="width:380px">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Hecho! </strong> {!! Session::get('SuccessExperiencia') !!}
    </div>
@endif
@if(Session::has('ErrorExperiencia'))
    <div class="alert alert-dismissible alert-danger" style="width:380px">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Error! </strong> {!! Session::get('ErrorExperiencia') !!}
    </div>
@endif
<button type="button" class="btn btn-success btn-md btnAddExperiencia" onclick="agregarExperiencia()" style="min-width: 200px; margin-bottom:20px">Agregar Elemento</button>
<button type="button" class="btn btn-info btn-md btnEditExperiencia" onclick="editarExperiencia({{$experiencia}})" style="min-width: 200px; margin-bottom:20px">Editar Elemento</button>
<button type="button" class="btn btn-danger btn-md btnDeleteExperiencia" onclick="eliminarExperiencia({{$experiencia}})" style="min-width: 200px; margin-bottom:20px">Eliminar Elemento</button>
<div class="formAddExperiencia" style="display:none" >
  <form class="col-sm-12" method="POST" action="/addExperiencia" enctype="multipart/form-data">
      <div class="form-group" style="margin-bottom:0px">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="row">
            <div class="col-xl-3">
              <input  class="form-control mb-1" name="NombreAddExperienciaEs"  placeholder="Título del elemento en español" >
            </div>
            <div class="col-xl-3">
              <input  class="form-control mb-1" name="NombreAddExperienciaEn"  placeholder="Título del elemento en inglés" >
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3">
              <textarea type="textarea" class="form-control" name="DescAddExperienciaEs" placeholder="Texto del elemento en español" rows="3" style="font-size: 14px; margin-bottom:5px"></textarea>
            </div>
            <div class="col-xl-3">
              <textarea type="textarea" class="form-control" name="DescAddExperienciaEn" placeholder="Texto del elemento en inglés" rows="3" style="font-size: 14px;"></textarea>
            </div>
          </div>
          <i style="margin-right:5px; font-style: normal;">Imágen del elemento:</i>
          <label style" display: inline-block"><input type="file" name="fileToUploadAddExp" id="fileToUploadAddExp" style="display:none"><b style="cursor:pointer">Seleccionar Imagen</b><span style="padding-left:2em" id="file-selectedAddExp" ></span></label>
      </div>
      <br><button type="submit" class="btn btn-default" style="margin-top:0px" onclick="this.disabled=true;this.form.submit()">Agregar</button>
      <a onclick="cancelarExperiencia()" class="btn btn-default" style="margin-top:0px">Cancelar</a>
  </form>
</div>
<div class="formEditExperiencia" style="display:none" >
  <form class="col-sm-12" method="POST" action="/editExperiencia" enctype="multipart/form-data">
      <div class="form-group" style="margin-bottom:0px">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="row">
            <div class="col-xl-3">
              <label for="SelEditExperiencia">Seleccione el elemento que desea editar</label>
              <select onchange="llenarEditExperiencia({{$experiencia}})" class="form-control" id="SelEditExperiencia" name="SelEditExperiencia"></select>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3">
              <label for="NombreEditExperienciaEs">Título del elemento en español</label>
              <input  class="form-control mb-1" name="NombreEditExperienciaEs" id="NombreEditExperienciaEs">
            </div>
            <div class="col-xl-3">
              <label for="NombreEditExperienciaEn">Título del elemento en inglés</label>
              <input  class="form-control mb-1" name="NombreEditExperienciaEn" id="NombreEditExperienciaEn">
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3">
              <label for="DescEditExperienciaEs">Texto del elemento en español</label>
              <textarea type="textarea" class="form-control" name="DescEditExperienciaEs" id="DescEditExperienciaEs" rows="3" style="font-size: 14px; margin-bottom:5px"></textarea>
            </div>
            <div class="col-xl-3">
              <label for="DescEditExperienciaEn">Texto del elemento en inglés</label>
              <textarea type="textarea" class="form-control" name="DescEditExperienciaEn" id="DescEditExperienciaEn" rows="3" style="font-size: 14px;"></textarea>
            </div>
          </div>
          <i style="margin-right:5px; font-style: normal;">Imágen del elemento:</i>
          <label style" display: inline-block"><input type="file" name="fileToUploadEditExp" id="fileToUploadEditExp" style="display:none"><b style="cursor:pointer">Seleccionar Imagen</b><span style="padding-left:2em" id="file-selectedEditExp" ></span></label>
          <i id="WarningExperiencia" class="text-info">Mientras no se seleccione una nueva imagen, se mantendrá la imagen actual del elemento.</i>
      </div>
      <br><button type="submit" class="btn btn-default" style="margin-top:0px">Actualizar</button>
      <a onclick="cancelarExperiencia()" class="btn btn-default" style="margin-top:0px">Cancelar</a>
  </form>
</div>
<div class="formDeleteExperiencia" style="display:none" >
  <form class="col-sm-12" method="POST" action="/deleteExperiencia">
      <div class="form-group">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="row">
            <div class="col-xl-3">
              <label for="SelDeleteExperiencia">Seleccione el elemento que desea eliminar</label>
              <select class="form-control" id="SelDeleteExperiencia" name="SelDeleteExperiencia"></select>
            </div>
          </div>
      </div>
      <br><button type="submit" class="btn btn-default" style="margin-top:8px" onclick="this.disabled=true;this.form.submit()">Eliminar</button>
      <a onclick="cancelarExperiencia()" class="btn btn-default" style="margin-top:8px">Cancelar</a>
  </form>
</div>

<br><br>
<h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar textos de descripción de experiencia.</h5><br>
@if(Session::has('SuccessTextoExperiencia'))
    <div class="alert alert-dismissible alert-success" style="width:380px">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Hecho! </strong> {!! Session::get('SuccessTextoExperiencia') !!}
    </div>
@endif
@if(Session::has('ErrorTextoExperiencia'))
    <div class="alert alert-dismissible alert-danger" style="width:380px">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Error! </strong> {!! Session::get('ErrorTextoExperiencia') !!}
    </div>
@endif
<button type="button" class="btn btn-info btn-md btnEditTxtExperiencia" onclick="editarTextoExperiencia()" style="min-width: 200px; margin-bottom:20px">Editar Textos</button>
<div class="formEditTxtExperiencia" style="display:none" >
  <form class="col-sm-12" method="POST" action="/editTextoExperiencia">
      <div class="form-group">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <label for="TextoExperienciaEs">Texto en español</label>
          <textarea type="textarea" class="form-control" name="TextoExperienciaEs" rows="3" style="font-size: 14px;">{{$textos[0]->expEs}}</textarea>
          <label for="TextoExperienciaEn">Texto en inglés</label>
          <textarea type="textarea" class="form-control" name="TextoExperienciaEn" rows="3" style="font-size: 14px;">{{$textos[0]->expEn}}</textarea>
      </div>
      <button type="submit" class="btn btn-default">Actualizar</button>
      <a onclick="cancelarExperiencia()" class="btn btn-default">Cancelar</a>
  </form>
</div>



</div>
@endsection
