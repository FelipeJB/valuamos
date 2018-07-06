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
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function createVinculo()
  {
    try {
      if (Auth::check()){
          if (Input::get('NombreAddVinculo')!=null && Input::get('NombreAddVinculo')!="" && Input::get('VinculoAddVinculo')!=null && Input::get('VinculoAddVinculo')!=""){
            //agregar vínculo
            $v = new vinculos();
            $v->nombre = Input::get('NombreAddVinculo');
            if (strpos(Input::get('VinculoAddVinculo'), 'http') === false) {
              $v->vinculo = 'http://' .Input::get('VinculoAddVinculo');
            }else{
              $v->vinculo = Input::get('VinculoAddVinculo');
            }
            $v->icono = Input::get('IconoAddVinculo');
            $v->save();
            return Redirect::to('/admin/footer')->with("SuccessVinculo", "Se agreg&oacute el vínculo");
          }
          return Redirect::to('/admin/footer')->with("ErrorVinculo", "Por favor ingrese todos los campos");
      }
    } catch (Exception $e) {
      return Redirect::to('/admin/footer')->with("ErrorVinculo", "Error agregando el vínculo");
    }
  }

  /**
   * Show the form for editing resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function editVinculo()
  {
    try {
      if (Auth::check()){
        //verificar si hay vínculos
        if(count(vinculos::all())!=0){
          if (Input::get('NombreEditVinculo')!=null && Input::get('NombreEditVinculo')!="" && Input::get('VinculoEditVinculo')!=null && Input::get('VinculoEditVinculo')!=""){
            //agregar vínculo

            $v = vinculos::where('id','=',Input::get('SelEditVinculo'))->get()[0];
            $v->nombre = Input::get('NombreEditVinculo');
            if (strpos(Input::get('VinculoEditVinculo'), 'http') === false) {
              $v->vinculo = 'http://' .Input::get('VinculoEditVinculo');
            }else{
              $v->vinculo = Input::get('VinculoEditVinculo');
            }
            $v->icono = Input::get('IconoEditVinculo');
            $v->save();
            return Redirect::to('/admin/footer')->with("SuccessVinculo", "Se actualiz&oacute el vínculo");

          }
          return Redirect::to('/admin/footer')->with("ErrorVinculo", "Por favor ingrese todos los campos");
        }
          return Redirect::to('/admin/footer')->with("ErrorVinculo", "No hay vínculos para editar");
      }
    } catch (Exception $e) {
      return Redirect::to('/admin/footer')->with("ErrorVinculo", "Error editando el vínculo");
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
