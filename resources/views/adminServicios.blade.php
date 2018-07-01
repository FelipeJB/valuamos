@extends('layouts.admin')

@section('titulo', 'Servicios')

@section('content')
<div class= "jumbotron">
  <h2>Administración de Servicios</<h2><br><br>
  <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar servicios.</h5><br>
  @if(Session::has('SuccessServicios'))
      <div class="alert alert-dismissible alert-success" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Hecho! </strong> {!! Session::get('SuccessServicios') !!}
      </div>
  @endif
  @if(Session::has('ErrorServicios'))
      <div class="alert alert-dismissible alert-danger" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error! </strong> {!! Session::get('ErrorServicios') !!}
      </div>
  @endif
  <button type="button" class="btn btn-success btn-md btnAddServicios" onclick="agregarServicios()" style="min-width: 200px; margin-bottom:20px">Agregar Servicio</button>
  <button type="button" class="btn btn-info btn-md btnEditServicios" onclick="editarServicios({{$servicios}})" style="min-width: 200px; margin-bottom:20px">Editar Servicio</button>
  <button type="button" class="btn btn-danger btn-md btnDeleteServicios" onclick="eliminarServicios({{$servicios}})" style="min-width: 200px; margin-bottom:20px">Eliminar Servicio</button>
  <div class="formAddServicios" style="display:none" >
    <form class="col-sm-12" method="POST" action="/addServicios">
        <div class="form-group">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="row">
              <div class="col-xl-3">
                <input  class="form-control mb-1" name="NombreAddServiciosEs"  placeholder="Nombre del servicio en español" >
              </div>
              <div class="col-xl-3">
                <input  class="form-control mb-1" name="NombreAddServiciosEn"  placeholder="Nombre del servicio en inglés" >
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3">
                <textarea type="textarea" class="form-control" name="DescAddServiciosEs" placeholder="Descripción del servicio en español" rows="3" style="font-size: 14px; margin-bottom:5px"></textarea>
              </div>
              <div class="col-xl-3">
                <textarea type="textarea" class="form-control" name="DescAddServiciosEn" placeholder="Descripción del servicio en inglés" rows="3" style="font-size: 14px;"></textarea>
              </div>
            </div>
            <label for="IconoAddServicios" style="margin:5px;float:left">Icono</label>
            <select class="form-control" id="IconoAddServicios" name="IconoAddServicios" style="width:80px; float:left; font-family:'FontAwesome'">
              <option value="fa-wrench">&#xf0ad;</option>
              <option value="fa-male">&#xf183;</option>
              <option value="fa-usd">&#xf155;</option>
              <option value="fa-eye">&#xf06e;</option>
              <option value="fa-globe">&#xf0ac;</option>
              <option value="fa-home">&#xf015;</option>
              <option value="fa-industry">&#xf275;</option>
              <option value="fa-info">&#xf129;</option>
              <option value="fa-key">&#xf084;</option>
              <option value="fa-lightbulb-o">&#xf0eb;</option>
              <option value="fa-phone">&#xf095;</option>
              <option value="fa-search">&#xf002;</option>
              <option value="fa-shopping-cart">&#xf07a;</option>
              <option value="fa-suitcase">&#xf0f2;</option>
              <option value="fa-book">&#xf02d;</option>
            </select>
        </div>
        <br><button type="submit" class="btn btn-default" style="margin-top:8px" onclick="this.disabled=true;this.form.submit()">Agregar</button>
        <a onclick="cancelarServicios()" class="btn btn-default" style="margin-top:8px">Cancelar</a>
    </form>
  </div>
  <div class="formEditServicios" style="display:none" >
    <form class="col-sm-12" method="POST" action="/editServicios">
        <div class="form-group">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="row">
              <div class="col-xl-3">
                <label for="SelEditServicios">Seleccione el servicio que desea editar</label>
                <select onchange="llenarEditServicios({{$servicios}})" class="form-control" id="SelEditServicios" name="SelEditServicios"></select>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3">
                <label for="NombreEditServiciosEs">Nombre del servicio en español</label>
                <input  class="form-control mb-1" name="NombreEditServiciosEs" id="NombreEditServiciosEs">
              </div>
              <div class="col-xl-3">
                <label for="NombreEditServiciosEn">Nombre del servicio en inglés</label>
                <input  class="form-control mb-1" name="NombreEditServiciosEn" id="NombreEditServiciosEn">
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3">
                <label for="DescEditServiciosEs">Descripción del servicio en español</label>
                <textarea type="textarea" class="form-control" name="DescEditServiciosEs" id="DescEditServiciosEs" rows="3" style="font-size: 14px; margin-bottom:5px"></textarea>
              </div>
              <div class="col-xl-3">
                <label for="DescEditServiciosEn">Descripción del servicio en inglés</label>
                <textarea type="textarea" class="form-control" name="DescEditServiciosEn" id="DescEditServiciosEn" rows="3" style="font-size: 14px;"></textarea>
              </div>
            </div>
            <label for="IconoEditServicios" style="margin:5px;float:left">Icono</label>
            <select class="form-control" id="IconoEditServicios" name="IconoEditServicios" style="width:80px; float:left; font-family:'FontAwesome'">
              <option value="fa-wrench">&#xf0ad;</option>
              <option value="fa-male">&#xf183;</option>
              <option value="fa-usd">&#xf155;</option>
              <option value="fa-eye">&#xf06e;</option>
              <option value="fa-globe">&#xf0ac;</option>
              <option value="fa-home">&#xf015;</option>
              <option value="fa-industry">&#xf275;</option>
              <option value="fa-info">&#xf129;</option>
              <option value="fa-key">&#xf084;</option>
              <option value="fa-lightbulb-o">&#xf0eb;</option>
              <option value="fa-phone">&#xf095;</option>
              <option value="fa-search">&#xf002;</option>
              <option value="fa-shopping-cart">&#xf07a;</option>
              <option value="fa-suitcase">&#xf0f2;</option>
              <option value="fa-book">&#xf02d;</option>
            </select>
        </div>
        <br><button type="submit" class="btn btn-default" style="margin-top:8px">Actualizar</button>
        <a onclick="cancelarServicios()" class="btn btn-default" style="margin-top:8px">Cancelar</a>
    </form>
  </div>
  <div class="formDeleteServicios" style="display:none" >
    <form class="col-sm-12" method="POST" action="/deleteServicios">
        <div class="form-group">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="row">
              <div class="col-xl-3">
                <label for="SelDeleteServicios">Seleccione el servicio que desea eliminar</label>
                <select class="form-control" id="SelDeleteServicios" name="SelDeleteServicios"></select>
              </div>
            </div>
        </div>
        <br><button type="submit" class="btn btn-default" style="margin-top:8px" onclick="this.disabled=true;this.form.submit()">Eliminar</button>
        <a onclick="cancelarServicios()" class="btn btn-default" style="margin-top:8px">Cancelar</a>
    </form>
  </div>

  <br><br>
  <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Administrar textos de descripción de los servicios.</h5><br>
  @if(Session::has('SuccessTextoServicios'))
      <div class="alert alert-dismissible alert-success" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Hecho! </strong> {!! Session::get('SuccessTextoServicios') !!}
      </div>
  @endif
  @if(Session::has('ErrorTextoServicios'))
      <div class="alert alert-dismissible alert-danger" style="width:380px">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error! </strong> {!! Session::get('ErrorTextoServicios') !!}
      </div>
  @endif
  <button type="button" class="btn btn-info btn-md btnEditTxtServicios" onclick="editarTextoServicios()" style="min-width: 200px; margin-bottom:20px">Editar Textos</button>
  <div class="formEditTxtServicios" style="display:none" >
    <form class="col-sm-12" method="POST" action="/editTextoServicios">
        <div class="form-group">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <label for="TextoServiciosEs">Texto en español</label>
            <textarea type="textarea" class="form-control" name="TextoServiciosEs" rows="3" style="font-size: 14px;">{{$textos[0]->serviciosEs}}</textarea>
            <label for="TextoServiciosEn">Texto en inglés</label>
            <textarea type="textarea" class="form-control" name="TextoServiciosEn" rows="3" style="font-size: 14px;">{{$textos[0]->serviciosEn}}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Actualizar</button>
        <a onclick="cancelarServicios()" class="btn btn-default">Cancelar</a>
    </form>
  </div>
</div>
@endsection
