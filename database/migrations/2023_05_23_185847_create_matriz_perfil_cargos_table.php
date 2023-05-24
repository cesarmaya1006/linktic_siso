<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrizPerfilCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriz_perfil_cargos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('matriz_cargo_id');
            $table->foreign('matriz_cargo_id', 'fk_matriz_cargos_matriz_perfis')->references('id')->on('matriz_cargos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('matriz_perfi_id')->nullable();
            $table->foreign('matriz_perfi_id', 'fk_matriz_perfis_matriz_cargos')->references('id')->on('matriz_perfis')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('matriz_perfil_cargos');
    }
}
