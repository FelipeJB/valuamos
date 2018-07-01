<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Empleado;
use Auth;
use Redirect;

class EquipoController extends Controller
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
          if (Input::get('NombreAddEquipo')!=null && Input::get('NombreAddEquipo')!="" && Input::get('CorreoAddEquipo')!=null && Input::get('CorreoAddEquipo')!=""){
            if (Input::get('CargoAddEquipoEs')!=null && Input::get('CargoAddEquipoEs')!="" && Input::get('CargoAddEquipoEn')!=null && Input::get('CargoAddEquipoEn')!=""){
                //agregar miembro
                $miembro = new Empleado();
                $miembro->nombre = Input::get('NombreAddEquipo');
                $miembro->cargoEs = Input::get('CargoAddEquipoEs');
                $miembro->cargoEn = Input::get('CargoAddEquipoEn');
                $miembro->email = Input::get('CorreoAddEquipo');
                $miembro->save();
                return Redirect::to('/admin/equipo')->with("SuccessEquipo", "Se agreg&oacute el miembro del equipo");
            }
            return Redirect::to('/admin/equipo')->with("ErrorEquipo", "Por favor ingrese un cargo válido para el miembro del equipo");
          }
          return Redirect::to('/admin/equipo')->with("ErrorEquipo", "Por favor ingrese todos los campos");
      }
    } catch (Exception $e) {
      return Redirect::to('/admin/equipo')->with("ErrorEquipo", "Error agregando el miembro del equipo");
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
        //verificar si hay miembros
        if(count(Empleado::all())!=0){
          if (Input::get('NombreEditEquipo')!=null && Input::get('NombreEditEquipo')!="" && Input::get('CorreoEditEquipo')!=null && Input::get('CorreoEditEquipo')!=""){
            if (Input::get('CargoEditEquipoEs')!=null && Input::get('CargoEditEquipoEs')!="" && Input::get('CargoEditEquipoEn')!=null && Input::get('CargoEditEquipoEn')!=""){
                //agregar miembro
                $miembro = Empleado::where('id','=',Input::get('SelEditEquipo'))->get()[0];
                $miembro->nombre = Input::get('NombreEditEquipo');
                $miembro->cargoEs = Input::get('CargoEditEquipoEs');
                $miembro->cargoEn = Input::get('CargoEditEquipoEn');
                $miembro->email = Input::get('CorreoEditEquipo');
                $miembro->save();
                return Redirect::to('/admin/equipo')->with("SuccessEquipo", "Se actualiz&oacute el miembro del equipo");
            }
            return Redirect::to('/admin/equipo')->with("ErrorEquipo", "Por favor ingrese un cargo válido para el miembro del equipo");
          }
          return Redirect::to('/admin/equipo')->with("ErrorEquipo", "Por favor ingrese todos los campos");
        }
        return Redirect::to('/admin/equipo')->with("ErrorEquipo", "No hay miembros del equipo para editar");
      }
    } catch (Exception $e) {
      return Redirect::to('/admin/equipo')->with("ErrorEquipo", "Error editando el miembro del equipo");
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
        //verificar si hay Miembros
        if(count(Empleado::all())==0){
          return Redirect::to('/admin/equipo')->with("ErrorEquipo", "No hay miembros de equipo para eliminar");
        }
        $miembro=Empleado::where('id','=',Input::get('SelDeleteEquipo'))->get()[0];
        $miembro->delete();
        return Redirect::to('/admin/equipo')->with("SuccessEquipo", "Se elimin&oacute el miembro del equipo");
      }
  }

}
