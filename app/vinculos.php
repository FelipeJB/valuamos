<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vinculos extends Model
{
  protected $fillable = [
    'id', 'nombre', 'vinculo', 'icono'
  ];
}
