<?php

namespace App\Http\Models\Eventos;

use Illuminate\Database\Eloquent\Model;

//Se basa en recoger los datos de la bdd
class ModelEvento extends Model
{
  protected $table = 'eventos';
  protected $primaryKey = 'id';


  //const CREATED_AT = 'FechaAltaEvento';
  //const UPDATED_AT = 'FechaModificacionEvento';

  public $timestamps = false;
}