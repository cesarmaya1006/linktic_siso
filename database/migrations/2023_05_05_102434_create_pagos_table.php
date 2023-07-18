<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_correo_corporativo', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->bigInteger('anno');
            $table->string('mes_facturado',255);
            $table->string('ticket', 255)->nullable();
            $table->unsignedBigInteger('dominio_id');
            $table->foreign('dominio_id', 'fk_pago_correos_corporativos_dominios_correos')->references('id')->on('dominio_correos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('centro_costos_id');
            $table->foreign('centro_costos_id', 'fk_correo_corporativo_centro_costos')->references('id')->on('centro_costos')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_de_pago')->nullable();
            $table->double('costo_dolares')->nullable();
            $table->double('trm')->nullable();
            $table->bigInteger('costo_pesos')->nullable();
            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago_correo_corporativo');
    }
}
