<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id';  
    protected $fillable=['id','nombre','apat','amat','empresa','telefono','direccion','cp','cp','municipio','usuario','activo'];
 }

