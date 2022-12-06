<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnets', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id', 'fk_carnet_rol')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
            $table->string('marco1', 255);
            $table->string('marco2', 255);
            $table->string('marco3', 255);
            $table->string('marco4', 255);
            $table->string('marco5', 255);
            $table->string('label1', 255);
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
        Schema::dropIfExists('carnets');
    }
}
