<?php

namespace App\Http\Models\Manifiestos;

use Illuminate\Database\Eloquent\Model;

//Se basa en recoger los datos de la bdd
class ModelManifiesto extends Model
{
  protected $table = 'manifiestos';
  protected $primaryKey='id';


  //const CREATED_AT = 'FechaAltaEvento';
  //const UPDATED_AT = 'FechaModificacionEvento';

  public $timestamps = false;
}