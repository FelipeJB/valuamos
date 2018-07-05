<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datosContacto extends Model
{
  protected $fillable = [
    'id', 'telefono', 'direccion'
  ];
}
