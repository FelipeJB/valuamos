<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Experiencia;
use Auth;
use Redirect;

class ExperienciaController extends Controller
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
          if (Input::get('NombreAddExperienciaEs')!=null && Input::get('NombreAddExperienciaEs')!="" && Input::get('NombreAddExperienciaEn')!=null && Input::get('NombreAddExperienciaEn')!=""){
            if (Input::get('DescAddExperienciaEs')!=null && Input::get('DescAddExperienciaEs')!="" && Input::get('DescAddExperienciaEn')!=null && Input::get('DescAddExperienciaEn')!=""){
                if(!Input::hasFile('fileToUploadAddExp')){
                    return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "Por favor seleccione una imagen para el elemento");
                }
                //agregar elemento
                $e = new Experiencia();
                $e->tituloEs = Input::get('NombreAddExperienciaEs');
                $e->tituloEn = Input::get('NombreAddExperienciaEn');
                $e->textoEs = Input::get('DescAddExperienciaEs');
                $e->textoEn = Input::get('DescAddExperienciaEn');
                //cargar archivo
                if(Storage::disk('public')->exists(Input::file('fileToUploadAddExp')->getClientOriginalName())){
                  return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "Ya se ha subido un archivo llamado ".Input::file('fileToUploadAddExp')->getClientOriginalName().". Cambie el nombre del archivo e intente de nuevo");
                }else{
                  Storage::putFileAs('public', Input::file('fileToUploadAddExp'), Input::file('fileToUploadAddExp')->getClientOriginalName());
                  $e->imagen = "imagenes/".Input::file('fileToUploadAddExp')->getClientOriginalName();
                }
                $e->save();
                return Redirect::to('/admin/experiencia')->with("SuccessExperiencia", "Se agreg&oacute el elemento");
            }
            return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "Por favor ingrese un texto válido para el elemento");
          }
          return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "Por favor ingrese un título válido para el elemento");
      }
    } catch (Exception $ex) {
      return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "Error agregando el elemento");
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
        if(count(Experiencia::all())!=0){
          if (Input::get('NombreEditExperienciaEs')!=null && Input::get('NombreEditExperienciaEs')!="" && Input::get('NombreEditExperienciaEn')!=null && Input::get('NombreEditExperienciaEn')!=""){
            if (Input::get('DescEditExperienciaEs')!=null && Input::get('DescEditExperienciaEs')!="" && Input::get('DescEditExperienciaEn')!=null && Input::get('DescEditExperienciaEn')!=""){
                //agregar elemento
                $e = Experiencia::where('id','=',Input::get('SelEditExperiencia'))->get()[0];
                $e->tituloEs = Input::get('NombreEditExperienciaEs');
                $e->tituloEn = Input::get('NombreEditExperienciaEn');
                $e->textoEs = Input::get('DescEditExperienciaEs');
                $e->textoEn = Input::get('DescEditExperienciaEn');
                if(Input::hasFile('fileToUploadEditExp')){
                  //cargar archivo
                  if(Storage::disk('public')->exists(Input::file('fileToUploadEditExp')->getClientOriginalName())){
                    return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "Ya se ha subido un archivo llamado ".Input::file('fileToUploadEditExp')->getClientOriginalName().". Cambie el nombre del archivo e intente de nuevo");
                  }else{
                    Storage::putFileAs('public', Input::file('fileToUploadEditExp'), Input::file('fileToUploadEditExp')->getClientOriginalName());
                    //borrar archivo anterior
                    $nomArchivo=substr($e->imagen,9);
                    if(Storage::disk('public')->exists($nomArchivo)){
                      Storage::disk('public')->delete($nomArchivo);
                    }
                    $e->imagen = "imagenes/".Input::file('fileToUploadEditExp')->getClientOriginalName();
                  }
                }
                $e->save();
                return Redirect::to('/admin/experiencia')->with("SuccessExperiencia", "Se actualiz&oacute el elemento");
            }
            return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "Por favor ingrese un texto válido para el elemento");
          }
          return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "Por favor ingrese un título válido para el elemento");
        }
        return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "No hay elementos para editar");
      }
    } catch (Exception $ex) {
      return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "Error editando el elemento");
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
        //verificar si hay elementos
        if(count(Experiencia::all())==0){
          return Redirect::to('/admin/experiencia')->with("ErrorExperiencia", "No hay elementos para eliminar");
        }
        $experiencia=Experiencia::where('id','=',Input::get('SelDeleteExperiencia'))->get()[0];
        $nomArchivo=substr($experiencia->imagen,9);
        if(Storage::disk('public')->exists($nomArchivo)){
        Storage::disk('public')->delete($nomArchivo);
        }
        $experiencia->delete();
        return Redirect::to('/admin/experiencia')->with("SuccessExperiencia", "Se elimin&oacute el elemento");
      }
  }


}
