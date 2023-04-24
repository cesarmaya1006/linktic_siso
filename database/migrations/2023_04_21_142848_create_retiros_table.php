<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retiros', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('empresa',255)->nullable();
            $table->string('cargo', 255)->nullable();
            $table->string('usuario', 255);
            $table->string('cedula', 50)->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('gestion', 255)->nullable();
            $table->string('contrato', 255)->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->string('ticket', 50)->nullable();
            $table->string('centro_costos', 255)->nullable();
            $table->text('observaciones')->nullable();
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
        Schema::dropIfExists('retiros');
    }
}
