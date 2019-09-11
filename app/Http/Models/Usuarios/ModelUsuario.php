<?php

namespace App\Http\Models\Usuarios;

use Illuminate\Database\Eloquent\Model;

//Se basa en recoger los datos de la bdd
class ModelUsuario extends Model
{
  protected $table = 'usuarios';
  protected $primaryKey='id';


  //const CREATED_AT = 'FechaAltaEvento';
  //const UPDATED_AT = 'FechaModificacionEvento';

  public $timestamps = false;
}