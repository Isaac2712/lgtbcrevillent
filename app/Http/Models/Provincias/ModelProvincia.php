<?php

namespace App\Http\Models\Provincias;

use Illuminate\Database\Eloquent\Model;

//Se basa en recoger los datos de la bdd
class ModelProvincia extends Model
{
  protected $table = 'provincias';
  protected $primaryKey='id';


  //const CREATED_AT = 'FechaAltaEvento';
  //const UPDATED_AT = 'FechaModificacionEvento';

  public $timestamps = false;
}