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
            $table->increments('id');
            $table->unsignedInteger('jornada_id');
            $table->foreign('jornada_id')->references('id')->on('jornadas');
            //->onDelete('cascade');
            $table->unsignedInteger('equipo_local');
            $table->foreign('equipo_local')->references('id')->on('equipos');
            $table->unsignedInteger('equipo_visitante');
            $table->foreign('equipo_visitante')->references('id')->on('equipos');
            $table->integer('resL')->nullable();
            $table->integer('resV')->nullable();
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
