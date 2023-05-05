<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoEquipoRentadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_equipo_rentados', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'fk_empleados_equipo_rentados')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('equipo_rentado_id');
            $table->foreign('equipo_rentado_id', 'fk_equipo_rentados_empleados')->references('id')->on('equipo_rentados')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('empleado_equipo_rentados');
    }
}
