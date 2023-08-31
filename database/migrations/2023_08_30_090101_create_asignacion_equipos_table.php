<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_equipos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('centro_costo_id');
            $table->foreign('centro_costo_id', 'fk_cencos_equipo_asignado')->references('id')->on('centro_costos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('nombre', 255);
            $table->string('cargo', 255);
            $table->string('jefe_directo', 255);
            $table->string('tikect', 255);
            $table->date('fecha_solicitud');
            $table->date('fecha_ingreso');
            $table->string('estado', 255);
            $table->longText('comentarios')->nullable();
            $table->string('equipo', 255);
            $table->longText('comentarios_equipo')->nullable();
            $table->string('tikect_renta', 255)->nullable();
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
        Schema::dropIfExists('asignacion_equipos');
    }
}
