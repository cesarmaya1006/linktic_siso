<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id', 'fk_categoria_equipo')->references('id')->on('categorias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_elemento_id');
            $table->foreign('estado_elemento_id', 'fk_estado_equipo')->references('id')->on('estado_elementos')->onDelete('restrict')->onUpdate('restrict');
            $table->text('pertenencia', 255);
            $table->text('proveedor', 255)->nullable();
            $table->text('fabricante', 255)->nullable();
            $table->text('serial', 255)->nullable();
            $table->text('modelo', 255)->nullable();
            $table->text('sistema_op', 255)->nullable();
            $table->text('ult_actualizacion', 255)->nullable();
            $table->text('procesador', 255)->nullable();
            $table->text('disco', 255)->nullable();
            $table->text('ram', 255)->nullable();
            $table->text('tarjeta_video', 255)->nullable();
            $table->text('puertos', 255)->nullable();
            $table->longText('otras_caracteristicas', 255)->nullable();
            $table->text('fecha_compra', 255)->nullable();
            $table->text('uso_estimado', 255)->nullable();
            $table->longText('observaciones', 255)->nullable();
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
        Schema::dropIfExists('equipos');
    }
}
