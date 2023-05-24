<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrizCuentasCorporativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriz_cuentas_corporativas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('matriz_cargo_id');
            $table->foreign('matriz_cargo_id', 'fk_matriz_cargos_cuenta_corporativas')->references('id')->on('matriz_cargos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('cuenta_corporativa_id')->nullable();
            $table->foreign('cuenta_corporativa_id', 'fk_cuenta_corporativas_matriz_cargos')->references('id')->on('cuenta_corporativas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('matriz_cuentas_corporativas');
    }
}
