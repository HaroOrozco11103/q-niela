<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPronosticoUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pronosticoUsuarios', function (Blueprint $table) {
            $table->string('user_username');
            $table->foreign('user_username')->references('username')->on('users');
            $table->integer('pronostico_id');
            $table->foreign('pronostico_id')->references('id')->on('pronosticos');
            $table->string('apodo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pronosticoUsuarios');
    }
}
