<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaRecursosConAcla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos_con_acla', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('conceptouopinionconsultas_id');
            $table->foreign('conceptouopinionconsultas_id', 'fk_conceptouopinionconsultas_recursos')->references('id')->on('conceptouopinionconsultas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tipo_reposicion_id');
            $table->foreign('tipo_reposicion_id', 'fk_tipo_reposicion_recursos_con_acla')->references('id')->on('tipo_reposicion')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_radicacion');
            $table->longText('recurso');
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
        Schema::dropIfExists('recursos_con_acla');
    }
}
