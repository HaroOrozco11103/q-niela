<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPartidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->integer('jornada_numero');
            $table->foreign('jornada_numero')->references('numero')->on('jornadas');
            //->onDelete('cascade');
            $table->string('equipo_local');
            $table->foreign('equipo_local')->references('nombre')->on('equipos');
            $table->string('equipo_visitante');
            $table->foreign('equipo_visitante')->references('nombre')->on('equipos');
            $table->string('resultado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidos');
    }
}
