<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('ips');
            $table->string('nit')->unique();
            $table->string('codigo_habilitacion_prestador');
            $table->date('fecha_inscripcion_reps');
            $table->date('fecha_vencimiento');
            $table->string('naturaleza_juridica');
            $table->string('nivel_complejidad');
            $table->integer('municipio');
            $table->string('direccion');
            $table->string('caracter_territorial');
            $table->string('director_general');
            $table->string('director_medico');
            $table->string('referente_ips');
            $table->string('cargo');
            $table->integer('telefono');
            $table->string('email')->unique();
            $table->string('atencion_infantil');
            $table->string('deteccion_temprana_enfermedades_cardiovasculares');
            $table->string('programas_atencion_obesidad');
            $table->string('programas_atencion_diabetes');
            $table->string('programas_atencion_hta');
            $table->string('procesos_atencion_deteccion_temprana_cancer');
            $table->string('enfoque_diferencial_procesos_atencion');
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
        Schema::dropIfExists('users_inscriptions');
    }
}
