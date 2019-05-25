<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pronostico extends Model
{
    public $timestamps = false;
    
    protected $guarded = ['id'];

    /**
     * Establece relación hacia un usuario
     * @return type
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Establece relación hacia muchos partidos
     * @return type
     */
    public function partidos()
    {
        return $this->belongsToMany(Partido::class);
    }
}
