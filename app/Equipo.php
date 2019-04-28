<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public $timestamps = false;

    /**
     * Establece relación hacia muchos usuarios
     * @return type
     */
    public function users()
    {
      return $this->hasMany('App\User');
    }

    /**
     * Establece relación hacia muchos partidos
     * @return type
     */
    public function partidos()
    {
      return $this->hasMany('App\Partido');
    }
}
