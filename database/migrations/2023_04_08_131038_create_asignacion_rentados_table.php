<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionRentadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacion_rentados', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('rentado_asignado_id');
            $table->foreign('rentado_asignado_id', 'fk_rentado_asignado_equipo')->references('id')->on('rentado_asignados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('equipo_rentado_id');
            $table->foreign('equipo_rentado_id', 'fk_equipo_rentado_rentado_asignado')->references('id')->on('equipo_rentados')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_asignacion');
            $table->date('fecha_devolucion')->nullable();
            $table->longText('observaciones_asignacion')->nullable();
            $table->longText('observaciones_devolucion')->nullable();
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
        Schema::dropIfExists('asignacion_rentados');
    }
}
