<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Servicio;
use Auth;
use Redirect;

class ServiciosController extends Controller
{

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    try {
      if (Auth::check()){
          if (Input::get('NombreAddServiciosEs')!=null && Input::get('NombreAddServiciosEs')!="" && Input::get('NombreAddServiciosEn')!=null && Input::get('NombreAddServiciosEn')!=""){
            if (Input::get('DescAddServiciosEs')!=null && Input::get('DescAddServiciosEs')!="" && Input::get('DescAddServiciosEn')!=null && Input::get('DescAddServiciosEn')!=""){
                //agregar servicio
                $s = new Servicio();
                $s->nombreEs = Input::get('NombreAddServiciosEs');
                $s->nombreEn = Input::get('NombreAddServiciosEn');
                $s->descripcionEs = Input::get('DescAddServiciosEs');
                $s->descripcionEn = Input::get('DescAddServiciosEn');
                $s->icono = Input::get('IconoAddServicios');
                $s->save();
                return Redirect::to('/admin/servicios')->with("SuccessServicios", "Se agreg&oacute el servicio");
            }
            return Redirect::to('/admin/servicios')->with("ErrorServicios", "Por favor ingrese una descripción válida para el servicio");
          }
          return Redirect::to('/admin/servicios')->with("ErrorServicios", "Por favor ingrese un nombre válido para el servicio");
      }
    } catch (Exception $e) {
      return Redirect::to('/admin/servicios')->with("ErrorServicios", "Error agregando el servicio");
    }
  }

  /**
   * Show the form for editing a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
    try {
      if (Auth::check()){
        //verificar si hay Servicios
        if(count(Servicio::all())!=0){
          if (Input::get('NombreEditServiciosEs')!=null && Input::get('NombreEditServiciosEs')!="" && Input::get('NombreEditServiciosEn')!=null && Input::get('NombreEditServiciosEn')!=""){
            if (Input::get('DescEditServiciosEs')!=null && Input::get('DescEditServiciosEs')!="" && Input::get('DescEditServiciosEn')!=null && Input::get('DescEditServiciosEn')!=""){
                //agregar servicio
                $s = Servicio::where('id','=',Input::get('SelEditServicios'))->get()[0];
                $s->nombreEs = Input::get('NombreEditServiciosEs');
                $s->nombreEn = Input::get('NombreEditServiciosEn');
                $s->descripcionEs = Input::get('DescEditServiciosEs');
                $s->descripcionEn = Input::get('DescEditServiciosEn');
                $s->icono = Input::get('IconoEditServicios');
                $s->save();
                return Redirect::to('/admin/servicios')->with("SuccessServicios", "Se actualiz&oacute el servicio");
            }
            return Redirect::to('/admin/servicios')->with("ErrorServicios", "Por favor ingrese una descripción válida para el servicio");
          }
          return Redirect::to('/admin/servicios')->with("ErrorServicios", "Por favor ingrese un nombre válido para el servicio");
        }
          return Redirect::to('/admin/servicios')->with("ErrorServicios", "No hay servicios para editar");
      }
    } catch (Exception $e) {
      return Redirect::to('/admin/servicios')->with("ErrorServicios", "Error editando el servicio");
    }
  }



  /**
   * Remove the specified resource from storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function delete()
  {
      if (Auth::check()) {
        //verificar si hay Servicios
        if(count(Servicio::all())==0){
          return Redirect::to('/admin/servicios')->with("ErrorServicios", "No hay servicios para eliminar");
        }
        $servicio=Servicio::where('id','=',Input::get('SelDeleteServicios'))->get()[0];
        $servicio->delete();
        return Redirect::to('/admin/servicios')->with("SuccessServicios", "Se elimin&oacute el servicio");
      }
  }


}
