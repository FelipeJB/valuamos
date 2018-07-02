@extends('layouts.admin')

@section('titulo', 'Mensaje')

@section('content')
<div class= "jumbotron" style="padding-top:40px; padding-bottom:40px">
  <h2>Mensaje de: {{$mensaje->nombre}}</h2><br>
</div>
@endsection
