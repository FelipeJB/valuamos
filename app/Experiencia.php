<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
  protected $fillable = [
    'id', 'tituloEs', 'tituloEn','textoEs','textoEn','imagen'
  ];
}
