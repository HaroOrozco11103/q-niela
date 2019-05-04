<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('email')->unique();
          $table->string('username')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->unsignedInteger('equipo_id')->nullable();
          //$table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('null');
          $table->string('tipo', 30)->default("comun");
          $table->rememberToken();
          $table->timestamps();       //crea dos campos que registran cuando fue creado y cuando se actualizó
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
