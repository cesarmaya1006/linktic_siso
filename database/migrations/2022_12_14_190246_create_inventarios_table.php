<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('dependencia_id');
            $table->foreign('dependencia_id', 'fk_dependencia_inventario')->references('id')->on('dependencias')->onDelete('restrict')->onUpdate('restrict');
            $table->string('categoria', 250);
            $table->string('elemento', 250);
            $table->string('codigo', 250)->nullable();
            $table->string('descripcion', 250)->nullable();
            $table->bigInteger('precio')->nullable();
            $table->bigInteger('stock');
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
        Schema::dropIfExists('inventarios');
    }
}
