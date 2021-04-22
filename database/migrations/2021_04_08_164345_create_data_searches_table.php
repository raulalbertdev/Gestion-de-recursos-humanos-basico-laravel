<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_searches', function (Blueprint $table) {
            $table->id();
            $table->string('posicion')->nullable();
            $table->string('ficha')->nullable();
            $table->string('nombre')->nullable();
            $table->string('regimen_contractual')->nullable();
            $table->string('id_integracion')->nullable();
            $table->string('validacion_integracion')->default('false');
            $table->string('id_desarrollo_humano')->nullable();
            $table->string('validacion_desarrollo_humano')->default('false');
            $table->string('id_departamento_personal')->nullable();
            $table->string('validacion_departamento_personal')->default('false');
            $table->string('status_rechazo')->default('false')->nullable();
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
        Schema::dropIfExists('data_searches');
    }
}
