<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Nombres');
            $table->string('Apellidos');
            $table->integer('Tipo_documento');
            $table->string('Documento')->unique();
            $table->date('Fecha_nacimiento');
            $table->string('Correo')->unique();
            $table->string('Direccion');
            $table->integer('Tipo_Usuario');
            $table->timestamp('Correo_Verificacion')->nullable();
            $table->string('Usuario')->unique();
            $table->string('Contrasena');
            $table->string('Estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
