<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorreoCorporativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correo_corporativos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id', 'fk_personas_correo')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('centro_id');
            $table->foreign('centro_id', 'fk_centros_correo')->references('id')->on('centros')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('dominio_empresa_id');
            $table->foreign('dominio_empresa_id', 'fk_dominio_empresas_correo')->references('id')->on('dominio_empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->string('correo', 255);
            $table->string('estado', 30);
            $table->bigInteger('tiket');
            $table->date('fec_creacion');
            $table->bigInteger('costo')->default(0);
            $table->longText('observaciones');
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
        Schema::dropIfExists('correo_corporativos');
    }
}
