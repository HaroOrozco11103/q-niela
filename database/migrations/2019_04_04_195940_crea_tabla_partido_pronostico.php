<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPartidoPronostico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partido_pronostico', function (Blueprint $table) {
            $table->unsignedInteger('pronostico_id');
            $table->foreign('pronostico_id')->references('id')->on('pronosticos');
            $table->unsignedInteger('partido_id');
            $table->foreign('partido_id')->references('id')->on('partidos');
            $table->string('prediccion');
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
    }
}
