<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {

            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('inventario_id');
            $table->foreign('inventario_id', 'fk_inventario_producto')->references('id')->on('inventarios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('elemento', 250);
            $table->string('codigo', 250)->nullable();
            $table->string('descripcion', 250)->nullable();
            $table->bigInteger('precio')->nullable();
            $table->bigInteger('cantidad')->default('0');
            $table->bigInteger('stock')->default('0');
            $table->boolean('estado')->default('1');
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
        Schema::dropIfExists('productos');
    }
}
