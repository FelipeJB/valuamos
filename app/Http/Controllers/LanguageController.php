<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Request;
use Redirect;

class LanguageController extends Controller
{


  public function english()
  {

    Request::session()->put('languaje', 'en');
    return Redirect::to('/');

  }

  public function spanish()
  {

    Request::session()->forget('languaje');
    return Redirect::to('/');

  }


}
