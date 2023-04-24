<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empresas_id')->default(7);
            $table->foreign('empresas_id', 'fk_empleado_empresas')->references('id')->on('empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->string('cargo', 255)->nullable();
            $table->string('usuario', 255);
            $table->string('cedula', 50)->unique()->nullable();
            $table->string('telefono', 50)->nullable();
            $table->unsignedBigInteger('gestionas_id');
            $table->foreign('gestionas_id', 'fk_empleado_gestionas')->references('id')->on('gestionas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('contratos_id');
            $table->foreign('contratos_id', 'fk_empleado_contratos')->references('id')->on('contratos')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_retiro')->nullable();
            $table->string('ticket', 50)->nullable();
            $table->unsignedBigInteger('centro_costos_id');
            $table->foreign('centro_costos_id', 'fk_empleado_centro_costos')->references('id')->on('centro_costos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('estado', 255)->default('Activo');
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
        Schema::dropIfExists('empleados');
    }
}
