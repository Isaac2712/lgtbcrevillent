<?php

namespace App\Http\Models\Municipios;

use Illuminate\Database\Eloquent\Model;

//Se basa en recoger los datos de la bdd
class ModelMunicipio extends Model
{
  protected $table = 'municipios';
  protected $primaryKey='id';


  //const CREATED_AT = 'FechaAltaEvento';
  //const UPDATED_AT = 'FechaModificacionEvento';

  public $timestamps = false;
}