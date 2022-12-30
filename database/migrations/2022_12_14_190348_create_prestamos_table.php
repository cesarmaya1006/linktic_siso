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
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id', 'fk_persona_prestamos')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id', 'fk_producto_prestamos')->references('id')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->date('fec_prestamo');
            $table->time('hor_prestamo');
            $table->date('fec_vencimiento');
            $table->time('hor_vencimiento');
            $table->bigInteger('cantidad');
            $table->longText('observaciones')->nullable();
            $table->date('fec_entrega')->nullable();
            $table->time('hor_entrega')->nullable();
            $table->string('tipo_entrega',100)->nullable();
            $table->bigInteger('cantidad_entrega')->nullable();
            $table->longText('estado_entrega')->nullable();
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
