<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDominioDaddiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dominio_daddies', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('cuenta',255);
            $table->string('estado', 255);
            $table->string('ticket_renovacion', 255)->nullable();
            $table->date('fecha_de_vencimiento')->nullable();
            $table->string('renovacion')->nullable();
            $table->unsignedBigInteger('centro_costos_id');
            $table->foreign('centro_costos_id', 'fk_dominio_daddies_centro_costos')->references('id')->on('centro_costos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'fk_user_daddy')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->string('factura',255)->nullable();
            $table->bigInteger('valor') ;
            $table->string('tarjeta',255)->nullable();
            $table->date('fecha_de_compra')->nullable();
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
        Schema::dropIfExists('dominio_daddies');
    }
}
