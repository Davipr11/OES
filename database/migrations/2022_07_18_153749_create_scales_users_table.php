<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScalesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scales_users', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->id();
            $table->integer('scalegobierno1');
            $table->integer('scalegobierno2');
            $table->integer('scalegobierno3');
            $table->integer('scalecohesionintegrabilidad1');
            $table->integer('scalecohesionintegrabilidad2');
            $table->integer('scalecohesionintegrabilidad3');
            $table->integer('scalecohesionintegrabilidad4');
            $table->integer('scaletrazabilidadresultado1');
            $table->integer('scaletrazabilidadresultado2');
            $table->integer('scaletrazabilidadresultado3');
            $table->bigInteger('codigoUsuario')->unsigned();
            $table->timestamps();
            $table->foreign('codigoUsuario')->references('Codigorandom')->on('users_inscriptions')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scales_users');
    }
}
