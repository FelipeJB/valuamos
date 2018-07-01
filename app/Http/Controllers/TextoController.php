<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Textos;
use Auth;
use Redirect;

class TextoController extends Controller
{

  /**
   * Show the form for editing a resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function editInicio()
  {
      if (Auth::check()){
          if (Input::get('TextoInicioEs')!=null && Input::get('TextoInicioEn')!=null){
                  $textos= \App\Textos::all();
                  $t=$textos[0];
                  $t->inicioEs=Input::get('TextoInicioEs');
                  $t->inicioEn=Input::get('TextoInicioEn');
                  $t->save();
                  return Redirect::to('/admin/inicio')->with("SuccessTextoInicio", "Se actualizaron los textos de inicio");
          }
          return Redirect::to('/admin/inicio')->with("ErrorTextoInicio", "Por favor ingrese todos los campos");
      }
  }

  /**
   * Show the form for editing a resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function editServicios()
  {
      if (Auth::check()){
          if (Input::get('TextoServiciosEs')!=null && Input::get('TextoServiciosEn')!=null){
                  $textos= \App\Textos::all();
                  $t=$textos[0];
                  $t->serviciosEs=Input::get('TextoServiciosEs');
                  $t->serviciosEn=Input::get('TextoServiciosEn');
                  $t->save();
                  return Redirect::to('/admin/servicios')->with("SuccessTextoServicios", "Se actualizaron los textos de servicios");
          }
          return Redirect::to('/admin/servicios')->with("ErrorTextoServicios", "Por favor ingrese todos los campos");
      }
  }

  /**
   * Show the form for editing a resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function editEquipo()
  {
      if (Auth::check()){
          if (Input::get('TextoEquipoEs')!=null && Input::get('TextoEquipoEn')!=null){
                  $textos= \App\Textos::all();
                  $t=$textos[0];
                  $t->equipoEs=Input::get('TextoEquipoEs');
                  $t->equipoEn=Input::get('TextoEquipoEn');
                  $t->save();
                  return Redirect::to('/admin/equipo')->with("SuccessTextoEquipo", "Se actualizaron los textos del equipo");
          }
          return Redirect::to('/admin/equipo')->with("ErrorTextoEquipo", "Por favor ingrese todos los campos");
      }
  }

  /**
   * Show the form for editing a resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function editExperiencia()
  {
      if (Auth::check()){
          if (Input::get('TextoExperienciaEs')!=null && Input::get('TextoExperienciaEn')!=null){
                  $textos= \App\Textos::all();
                  $t=$textos[0];
                  $t->expEs=Input::get('TextoExperienciaEs');
                  $t->expEn=Input::get('TextoExperienciaEn');
                  $t->save();
                  return Redirect::to('/admin/experiencia')->with("SuccessTextoExperiencia", "Se actualizaron los textos de experiencia");
          }
          return Redirect::to('/admin/experiencia')->with("ErrorTextoExperiencia", "Por favor ingrese todos los campos");
      }
  }

  /**
   * Show the form for editing a resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function editMensajes()
  {
      if (Auth::check()){
          if (Input::get('TextoMensajesEs')!=null && Input::get('TextoMensajesEn')!=null){
                  $textos= \App\Textos::all();
                  $t=$textos[0];
                  $t->contactoEs=Input::get('TextoMensajesEs');
                  $t->contactoEn=Input::get('TextoMensajesEn');
                  $t->save();
                  return Redirect::to('/admin/mensajes')->with("SuccessTextoMensajes", "Se actualizaron los textos de contacto");
          }
          return Redirect::to('/admin/mensajes')->with("ErrorTextoMensajes", "Por favor ingrese todos los campos");
      }
  }

}
