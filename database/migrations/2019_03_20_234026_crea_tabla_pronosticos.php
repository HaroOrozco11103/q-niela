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
            $table->string('user_username')->nullable();
            $table->foreign('user_username')->references('username')->on('users');
            $table->integer('jornada_numero')->unique();
            $table->foreign('jornada_numero')->references('numero')->on('jornadas');
            $table->integer('totalAciertos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pronosticos');
    }
}
