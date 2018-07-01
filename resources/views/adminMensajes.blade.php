@extends('layouts.admin')

@section('titulo', 'Mensajes')

@section('content')
<div class= "jumbotron">
  <h2>Administración de Mensajes</<h2><br><br>
    <h5><i class="fa fa-wrench"style="margin-right:8px"></i>Lista de mensajes.</h5><br>

    <script type= "text/javascript" src="{{ URL::asset('js/tab_divider.js') }}"></script>
    <table class="table table-hover">
      <thead>
        <tr class="table-secondary">
          <th width="2%"></th>
          <th scope="col" width="13%">Remitente</th>
          <th scope="col" width="13%">Email</th>
          <th scope="col" width="57%">Mensaje</th>
          <th scope="col" width="15%">Fecha</th>
        </tr>
      </thead>
      <tbody id="listaMensajes">
        @foreach($mensajes as $m)
          @if($m->leido=="true")
            <tr class='clickable-row' data-href='admin/mensajes/{{$m->id}}' style="cursor:pointer;">
              <td scope="col" ><i class="fa fa-envelope-open"></i></td>
              <td scope="col" >{{$m->nombre}}</td>
              <td scope="col" >{{$m->email}}</td>
              <td scope="col" >@if(strlen($m->mensaje)>60) {{substr($m->mensaje,0,60)."..."}} @else {{substr($m->mensaje,0,60)}} @endif</td>
              <td scope="col" >{{substr($m->fecha,0,16)}}</td>
            </tr>
          @else
            <tr class='clickable-row' data-href='/admin/mensajes/{{$m->id}}' style="cursor:pointer">
              <td scope="col" style="font-weight: 700"><i class="fa fa-envelope"></i></td>
              <td scope="col" style="font-weight: 700">{{$m->nombre}}</td>
              <td scope="col" style="font-weight: 700">{{$m->email}}</td>
              <td scope="col" style="font-weight: 700">@if(strlen($m->mensaje)>60) {{substr($m->mensaje,0,60)."..."}} @else {{substr($m->mensaje,0,60)}} @endif</td>
              <td scope="col" style="font-weight: 700">{{substr($m->fecha,0,16)}}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>

    @if (count($mensajes)>10)
       <ul class="pagination pagination-sm" id="myPager" style="float:right"></ul>
       <script>$('#listaMensajes').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:10});</script>
    @endif

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
