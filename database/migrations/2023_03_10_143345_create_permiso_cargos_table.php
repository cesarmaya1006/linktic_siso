<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_cargos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id', 'fk_cargos_permisos')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id', 'fk_permisos_menu')->references('id')->on('menu')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('listar')->default(1);
            $table->boolean('buscar')->default(1);
            $table->boolean('guardar')->default(1);
            $table->boolean('actualizar')->default(1);
            $table->boolean('borrar')->default(1);
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
        Schema::dropIfExists('permiso_cargos');
    }
}
