<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    //public $timestamps = false;
    //protected $table = 'nombre'; //relaciona modelo con esa tabla por si la clase se llama diferente en plural o algo así
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'username', 'email', 'password', 'equipo_id', 'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Agrupa el nombre, username y correo de un usuario para crear una variable nueva.
     * @return string
     */
    public function getDatosUserAttribute()
    {
        return $this->id . ' - ' . $this->nombre . ' - ' . $this->username . ' - ' . $this->email;
    }

    /**
     * Guarda el email en minúsculas.
     * @param string $email
     * @return void
     */
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }

    /**
     * Establece relación hacia un equipo
     * @return type
     */
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    /**
     * Relación hacia muchos pronosticos
     * @return type
     */
    public function pronostico()
    {
        return $this->hasMany('App\Pronostico');
    }
}
