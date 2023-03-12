<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dominios', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id', 'fk_categoria_dominios')->references('id')->on('categorias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('centro_id');
            $table->foreign('centro_id', 'fk_centros_dominios')->references('id')->on('centros')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id', 'fk_personas_dominios')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->text('nombre', 255);
            $table->text('estado', 30);
            $table->date('fec_vencimiento');
            $table->boolean('aprob_renovacion')->default(0);
            $table->text('tiket_renovacion', 20)->nullable();
            $table->text('no_factura', 255);
            $table->bigInteger('valor');
            $table->bigInteger('tarj_credito')->default(0);
            $table->date('fec_compra_renovacion')->nullable();
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
        Schema::dropIfExists('dominios');
    }
}
