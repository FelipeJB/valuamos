<?php

namespace App\Http\Controllers;

use App\Mail\AnswerMail;
use App\Mail\NotificationMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Exception;
use Illuminate\Database\QueryException;
use App\Mensaje;
use App\User;
use Request;
use Auth;
use Redirect;
use Carbon\Carbon;


class MessageController extends Controller
{

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    try {
          if (Input::get('name')!=" " && Input::get('email')!=" " && Input::get('message')!=" "){

                $m = new Mensaje();
                $m->nombre = Input::get('name');
                $m->email = Input::get('email');
                $m->mensaje = Input::get('message');
                $m->leido = "false";
                $m->fecha= Carbon::now()->toDateTimeString();

                $m->save();

                // send mail
                Mail::to(User::all()[0]->email)->send(new NotificationMail($m->nombre,$m->mensaje));

                if(Request::session()->has('languaje')){
                  return Redirect::to('/#contact')->with("SuccesMessage", "The message was sent");
                }
                else{
                  return Redirect::to('/#contact')->with("SuccesMessage", "Se envió el mensaje");
                }

            }
            if(Request::session()->has('languaje')){
              return Redirect::to('/#contact')->with("ErrorMessage", "Error, please enter valid values");
            }
            else{
              return Redirect::to('/#contact')->with("ErrorMessage", "Error, por favor ingrese valores válidos");
            }

    } catch (QueryException $e) {

      if(Request::session()->has('languaje')){
        return Redirect::to('/#contact')->with("ErrorMessage", "Error, the message should not be larger than 2000 characters");
      }
      else{
        return Redirect::to('/#contact')->with("ErrorMessage", "Error, el mensaje no debe ser mayor a 2000 caracteres");
      }
    } catch (Exception $e) {

      if(Request::session()->has('languaje')){
        return Redirect::to('/#contact')->with("ErrorMessage", "Error");
      }
      else{
        return Redirect::to('/#contact')->with("ErrorMessage", "Error");
      }
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
        $mensaje=Mensaje::where('id','=',Input::get('idMensaje'))->get()[0];
        $mensaje->delete();
        return Redirect::to('/admin/mensajes')->with("SuccessMessageAction", "Mensaje eliminado");
      }
  }

  /**
   * Answer the message.
   *
   * @return \Illuminate\Http\Response
   */
  public function answer()
  {
      if (Auth::check()) {
        if (Input::get('AsuntoMensaje')!=null && Input::get('AsuntoMensaje')!="" && Input::get('Mensaje')!=null && Input::get('Mensaje')!=""){

        // send mail
        Mail::to(Input::get('RemitenteMensaje'))->send(new AnswerMail(Input::get('AsuntoMensaje'),Input::get('Mensaje')));
        return Redirect::to('/admin/mensajes')->with("SuccessMessageAction", "Respuesta enviada");
        }
        return Redirect::to('/admin/mensajes')->with("ErrorMessageAction", "Por favor ingrese todos los campos para responder un mensaje");
      }
  }

}
