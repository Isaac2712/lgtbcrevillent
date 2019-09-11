<?php

namespace App\Http\Models\Noticias;

use Illuminate\Database\Eloquent\Model;

//Se basa en recoger los datos de la bdd
class ModelNoticia extends Model
{
  protected $table = 'noticias';
  protected $primaryKey='id';


  //const CREATED_AT = 'FechaAltaEvento';
  //const UPDATED_AT = 'FechaModificacionEvento';

  public $timestamps = false;
}