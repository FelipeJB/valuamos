<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\datosContacto;
use App\vinculos;
use Auth;
use Redirect;

class FooterController extends Controller
{

  /**
   * Show the form for editing a resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function editDatos()
  {
      if (Auth::check()){
          if (Input::get('TelefonoEditDatos')!=null && Input::get('DireccionEditDatos')!=null){
                  $datos= \App\datosContacto::all();
                  $d=$datos[0];
                  $d->direccion=Input::get('DireccionEditDatos');
                  $d->telefono=Input::get('TelefonoEditDatos');
                  $d->save();
                  return Redirect::to('/admin/footer')->with("SuccessDatos", "Se actualizaron los datos de contacto");
          }
          return Redirect::to('/admin/footer')->with("ErrorDatos", "Por favor ingrese todos los campos");
      }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function deleteVinculo()
  {
      if (Auth::check()) {
        //verificar si hay Vinculos
        if(count(vinculos::all())==0){
          return Redirect::to('/admin/footer')->with("ErrorVinculo", "No hay vínculos para eliminar");
        }
        $vinculo=vinculos::where('id','=',Input::get('SelDeleteVinculo'))->get()[0];
        $vinculo->delete();
        return Redirect::to('/admin/footer')->with("SuccessVinculo", "Se elimin&oacute el vínculo");
      }
  }

}
