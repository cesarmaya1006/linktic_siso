<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrizPerfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriz_perfis', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('perfil', 255);
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
        Schema::dropIfExists('matriz_perfis');
    }
}