<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    //protected $table = 'nombre'; //relaciona modelo con esa tabla por si la clase se llama diferente en plural o algo así
    public $timestamps = false;

    /**
     * Establece relación hacia muchos partidos
     * @return type
     */
    public function partidos()
    {
      return $this->hasMany('App\Partido');
    }
}
