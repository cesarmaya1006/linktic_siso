<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_usuario_prestamos')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('inventario_id');
            $table->foreign('inventario_id', 'fk_inventario_prestamos')->references('id')->on('inventarios')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fec_prestamo');
            $table->time('hor_prestamo');
            $table->date('fec_vencimiento');
            $table->time('hor_vencimiento');
            $table->bigInteger('cantidad');
            $table->longText('observaciones')->nullable();
            $table->bigInteger('estado')->default('1');
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
        Schema::dropIfExists('prestamos');
    }
}
