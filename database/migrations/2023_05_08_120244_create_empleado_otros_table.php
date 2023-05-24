<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoOtrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_otros', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'fk_empleados_otros')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('elemento', 255);
            $table->string('entidad', 255)->nullable();
            $table->unsignedBigInteger('otro_estado_id')->default(1);
            $table->foreign('otro_estado_id', 'fk_otro_estado_equipo')->references('id')->on('rentado_estados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('fabricante', 255)->nullable();
            $table->string('num_serie', 255)->nullable();
            $table->string('localizacion', 255)->nullable();
            $table->string('tipo', 255)->nullable();
            $table->string('modelo', 255)->nullable();
            $table->string('comentario', 255)->nullable();
            $table->string('estado', 5)->default('1');
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
        Schema::dropIfExists('empleado_otros');
    }
}
