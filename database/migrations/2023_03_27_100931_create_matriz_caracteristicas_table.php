<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrizCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriz_caracteristicas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('area', 255);
            $table->string('sis_operativo', 255)->default('N/A');
            $table->string('disco_duro', 255)->default('N/A');
            $table->string('ram', 255)->default('N/A');
            $table->string('procesador', 255)->default('N/A');
            $table->string('tarj_video', 255)->default('N/A');
            $table->string('puertos', 255)->default('N/A');
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriz_caracteristicas');
    }
}

