<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('nombre', 255);
            $table->string('apellido', 255)->nullable();
            $table->string('correo', 255);
            $table->string('dominio', 255);
            $table->unsignedBigInteger('dominio_id');
            $table->foreign('dominio_id', 'fk_correo_dominio')->references('id')->on('dominio_correos')->onDelete('restrict')->onUpdate('restrict');
            $table->string('estado', 255);
            $table->string('ticket', 255)->nullable();
            $table->timestamp('fecha_de_creacion')->nullable();
            $table->unsignedBigInteger('centro_costos_id');
            $table->foreign('centro_costos_id', 'fk_correo_centro_costos')->references('id')->on('centro_costos')->onDelete('restrict')->onUpdate('restrict');
            $table->double('costo_dolares')->nullable();
            $table->bigInteger('costo_pesos')->nullable();
            $table->bigInteger('trm')->nullable();
            $table->timestamp('fecha_de_eliminacion')->nullable();
            $table->longText('comentarios')->nullable();
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
        Schema::dropIfExists('correos');
    }
}
