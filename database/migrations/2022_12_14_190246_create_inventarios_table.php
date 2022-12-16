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
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_usuario_inventario')->references('id')->on('usuarios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('nom_inventario', 250)->unique();
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
