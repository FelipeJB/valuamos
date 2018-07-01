<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Textos extends Model
{
  protected $fillable = [
    'id', 'inicioEs', 'inicioEn','serviciosEs','serviciosEn','equipoEs','equipoEn','expEs','expEn','contactoEs','contactoEn'
  ];
}
