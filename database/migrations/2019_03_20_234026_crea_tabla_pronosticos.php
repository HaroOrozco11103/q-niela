<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPronosticos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pronosticos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apodo');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('jornada_id');
            $table->integer('totalAciertos');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jornada_id')->references('id')->on('jornadas');
        });

        Schema::create('partido_pronostico', function (Blueprint $table) {
            $table->unsignedInteger('partido_id');
            $table->unsignedInteger('pronostico_id');
            $table->string('prediccion');
            $table->boolean('acierto')->default(false);

            $table->foreign('pronostico_id')->references('id')->on('pronosticos');
            $table->foreign('partido_id')->references('id')->on('partidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partido_pronostico');
        Schema::dropIfExists('pronosticos');
    }
}
