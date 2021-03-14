<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDocumentosProcesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_procesos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('procesos_id');
            $table->foreign('procesos_id', 'fk_documentos_procesos_procesos')->references('id')->on('procesos')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fecha_documento');
            $table->string('descripcion_documento', 1000);
            $table->string('tipo_documento', 255);
            $table->string('nombre_doc', 255);
            $table->string('url_doc', 255);
            $table->string('usuario', 255);
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
        Schema::dropIfExists('documentos_procesos');
    }
}
