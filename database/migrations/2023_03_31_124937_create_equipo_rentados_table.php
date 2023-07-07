<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoRentadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_rentados', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('proveedor_rentado_id');
            $table->foreign('proveedor_rentado_id', 'fk_proveedor_rentado_equipo')->references('id')->on('proveedor_rentados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('centro_costo_id');
            $table->foreign('centro_costo_id', 'fk_centro_costo_equipo')->references('id')->on('centro_costos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('sub_centro_costo_id')->nullable();
            $table->foreign('sub_centro_costo_id', 'fk_sub_centro_costo_equipo')->references('id')->on('sub_centro_costos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('rentado_responsable_id')->nullable();
            $table->foreign('rentado_responsable_id', 'fk_rentado_responsable_equipo')->references('id')->on('rentado_responsables')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('rentado_tipo_id');
            $table->foreign('rentado_tipo_id', 'fk_glpi_rentado_tipo_equipo_rentado')->references('id')->on('rentado_tipos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('serial',100);
            $table->string('codigo',100);
            $table->bigInteger('ticket');
            $table->bigInteger('valor')->default(0);
            $table->date('fecha_entrega');
            $table->date('fecha_devolucion')->nullable();
            $table->unsignedBigInteger('rentado_estado_id')->default(1);
            $table->foreign('rentado_estado_id', 'fk_rentado_estado_equipo')->references('id')->on('rentado_estados')->onDelete('restrict')->onUpdate('restrict');
            $table->longText('observaciones')->nullable();
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
        Schema::dropIfExists('equipo_rentados');
    }
}
