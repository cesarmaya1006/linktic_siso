<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasAdministradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias_administradas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('empleados_id');
            $table->foreign('empleados_id', 'fk_empleados_licenciasadministradas')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('departamento', 255);
            $table->string('licencia_tipo', 255);
            $table->bigInteger('cantidad');
            $table->date('fecha_vencimietno');
            $table->string('cuenta_acceso', 255);
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
        Schema::dropIfExists('licencias_administradas');
    }
}
