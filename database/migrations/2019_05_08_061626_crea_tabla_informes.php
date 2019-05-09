<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaTablaInformes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email')->nullable();
            $table->string('username')->nullable();
            $table->string('informe', 999);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informes');
    }
}
