<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jornada_id', 'equipo_local', 'equipo_visitante',
        'resL', 'resV',
    ];

    /**
     * Establece relación hacia un equipo
     * @return type
     */
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    /**
     * Establece relación hacia una jornada
     * @return type
     */
    public function jornada()
    {
        return $this->belongsTo(Jornada::class);
    }

    /**
     * Establece relación hacia muchos pronosticos
     * @return type
     */
    public function pronosticos()
    {
        return $this->belongsToMany(Pronostico::class)->withPivot('prediccion', 'acierto');
    }
}
