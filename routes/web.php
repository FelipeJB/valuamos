<?php


Route::get('/', function () {
  $servicios= \App\Servicio::all();
  $textos= \App\Textos::all();
  $empleados= \App\Empleado::all();
  $experiencias= \App\Experiencia::all();
  $datos= \App\datosContacto::all();
  $vinculos= \App\vinculos::all();
    return view('home', compact('servicios','textos','empleados','experiencias','datos','vinculos'));
});

Route::get('en', 'LanguageController@english');

Route::get('es', 'LanguageController@spanish');

Route::get('imagenes/{id}', function ($id) {
  if(Storage::disk('public')->exists($id)){
    return Storage::download("public/".$id);
  }
  abort(404);
});

Route::get('/admin', function () {
    return view('adminHome');
})->middleware('auth');;

Route::get('/admin/inicio', function () {
    $textos= \App\Textos::all();
    return view('adminInicio', compact('textos'));
})->middleware('auth');

Route::get('/admin/servicios', function () {
    $textos= \App\Textos::all();
    $servicios= \App\Servicio::all();
    return view('adminServicios', compact('textos','servicios'));
})->middleware('auth');

Route::get('/admin/equipo', function () {
    $textos= \App\Textos::all();
    $equipo= \App\Empleado::all();
    return view('adminEquipo', compact('textos','equipo'));
})->middleware('auth');

Route::get('/admin/experiencia', function () {
    $textos= \App\Textos::all();
    $experiencia= \App\Experiencia::all();
    return view('adminExperiencia', compact('textos','experiencia'));
})->middleware('auth');

Route::get('/admin/mensajes', function () {
    $textos= \App\Textos::all();
    $mensajes= \App\Mensaje::orderBy('id', 'desc')->get();
    return view('adminMensajes', compact('textos','mensajes'));
})->middleware('auth');

Route::get('/admin/mensajes/{id}', function ($id) {
    $mensaje= \App\Mensaje::where('id', '=', $id)->get();
    if (count($mensaje)!=0){
      $mensaje[0]->leido="true";
      $mensaje[0]->save();
      return view('mensaje', compact('mensaje'));
    }
    else{
      return view('adminHome');
    }
})->middleware('auth');

Route::get('/admin/correo', function () {
    return view('adminCorreo');
})->middleware('auth');

Route::get('/admin/footer', function () {
    $datos= \App\datosContacto::all();
    $vinculos= \App\vinculos::all();
    return view('adminFooter', compact('datos','vinculos'));
})->middleware('auth');

Route::post('sendMessage', 'MessageController@create');

Route::post('editTextoInicio', 'TextoController@editInicio');

Route::post('editTextoServicios', 'TextoController@editServicios');

Route::post('editTextoEquipo', 'TextoController@editEquipo');

Route::post('editTextoExperiencia', 'TextoController@editExperiencia');

Route::post('editTextoMensajes', 'TextoController@editMensajes');

Route::post('passwordUpdate', 'Controller@updatePassword');

Route::post('deleteServicios', 'ServiciosController@delete');

Route::post('addServicios', 'ServiciosController@create');

Route::post('editServicios', 'ServiciosController@edit');

Route::post('deleteEquipo', 'EquipoController@delete');

Route::post('addEquipo', 'EquipoController@create');

Route::post('editEquipo', 'EquipoController@edit');

Route::post('deleteExperiencia', 'ExperienciaController@delete');

Route::post('addExperiencia', 'ExperienciaController@create');

Route::post('editExperiencia', 'ExperienciaController@edit');

Route::post('deleteMensaje', 'MessageController@delete');

Route::post('responderMensaje', 'MessageController@answer');

Route::post('addVinculo', 'FooterController@createVinculo');

Route::post('editVinculo', 'FooterController@editVinculo');

Route::post('deleteVinculo', 'FooterController@deleteVinculo');

Route::post('editDatos', 'FooterController@editDatos');

Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@validateRegisterShow']);
Route::post('/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@registerValidator']);

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
