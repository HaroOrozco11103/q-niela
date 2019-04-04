<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaPronosticoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pronostico_usuario', function (Blueprint $table) {
            $table->string('user_username');
            $table->foreign('user_username')->references('username')->on('users');
            $table->unsignedInteger('pronostico_id');
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
        Schema::dropIfExists('pronostico_usuario');
    }
}
