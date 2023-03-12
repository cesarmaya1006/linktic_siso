<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id', 'fk_categoria_licencia')->references('id')->on('categorias')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('estado_elemento_id');
            $table->foreign('estado_elemento_id', 'fk_estado_licencia')->references('id')->on('estado_elementos')->onDelete('restrict')->onUpdate('restrict');
            $table->text('licencia', 255);
            $table->text('pertenencia', 50);
            $table->text('proveedor', 255)->nullable();
            $table->text('fabricante', 255)->nullable();
            $table->text('serial', 255)->nullable();
            $table->text('tipo_licencia', 255)->nullable();
            $table->date('fec_vencimiento')->nullable();
            $table->bigInteger('cantidad')->default(0);
            $table->text('usuario', 255)->nullable();
            $table->text('password', 255)->nullable();
            $table->longText('observaciones', 255)->nullable();
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
        Schema::dropIfExists('licencias');
    }
}
