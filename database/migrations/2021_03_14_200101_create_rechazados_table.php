<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechazadosTable extends Migration
{
    public function up()
    {
        Schema::create('rechazados', function (Blueprint $table) {
            $table->id();
            $table->string('posicion');
            $table->string('ficha');
            $table->string('nombre');
            $table->string('regimen_contractual');
            $table->text('observaciones');
            $table->string('departamento');
            $table->text('url_notificacion_no_procedencia')->nullable();
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
        Schema::dropIfExists('rechazados');
    }
}
