<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->foreign('id')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('docutipos_id');
            $table->foreign('docutipos_id', 'fk_persona_docutipos')->references('id')->on('docutipos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->foreign('cargo_id', 'fk_persona_cargos')->references('id')->on('cargos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->foreign('contrato_id', 'fk_persona_contratos')->references('id')->on('contratos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('centro_id')->nullable();
            $table->foreign('centro_id', 'fk_persona_centros')->references('id')->on('centros')->onDelete('restrict')->onUpdate('restrict');
            $table->string('identificacion', 100)->unique();
            $table->string('nombre1', 50);
            $table->string('nombre2', 50)->nullable();
            $table->string('apellido1', 50);
            $table->string('apellido2', 50)->nullable();
            $table->string('telefono', 50);
            $table->string('direccion', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->string('foto', 255)->default('usuario-inicial.jpg');
            $table->bigInteger('asignacion')->default(0)->nullable();
            $table->boolean('estado')->default('1');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->string('tiket', 50)->nullable();
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
        Schema::dropIfExists('personas');
    }
}
