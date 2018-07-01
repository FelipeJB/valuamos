<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use Illuminate\Support\Facades\Input;
use Redirect;
use Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Actualiza una contraseña
     */
    public function updatePassword()
    {
        /*Se guardan los datos del usuario dentro de un
        arreglo desde el formulario*/
        $contraVieja = Input::get('ca');
        $contraNueva1 = Input::get('cn');
        $contraNueva2 = Input::get('ccn');




        if (Hash::check($contraVieja, Auth::user()->password)) {

          //validar contraseñas iguales
          if($contraNueva1 != $contraNueva2){
            return Redirect::to('/admin/inicio')->with("ErrorPassword", "Contraseñas nuevas no coinciden");
          }

          //validar 6 caracteres mínimo
          else if(strlen($contraNueva1)<6){
            return Redirect::to('/admin/inicio')->with("ErrorPassword", "Contraseña nueva debe tener más de 6 caracteres");
          }

          else{
          $user = Auth::user();
          $user->password=Hash::make($contraNueva1);
          $user->save();
          return Redirect::to('/admin/inicio')->with("SuccessPassword", "Contraseña actualizada");
          }



        }
        else{
          return Redirect::to('/admin/inicio')->with("ErrorPassword", "Contraseña actual incorrecta");
        }

    }
}
