<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    //protected $table = 'nombre'; //relaciona modelo con esa tabla por si la clase se llama diferente en plural o algo así
    public $timestamps = false;
    protected $dates = ['inicio', 'fin'];

    /**
     * Scope a query to only include jornadas terminadas.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTerminada($query)
    {
        return $query->where('fin', '<=', \Carbon\Carbon::now()->toDateString());
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
