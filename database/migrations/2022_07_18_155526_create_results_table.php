<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->double('PorcenajeGobierno');
            $table->double('PorcenajeCohesionIntegralidad');
            $table->double('PorcenajeTrazabilidad');
            $table->double('PorcenajeTotal');
            $table->bigInteger('scaleUser')->unsigned()->unique();
            $table->timestamps();
            $table->foreign('scaleUser')->references('id')->on('scales_users')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
