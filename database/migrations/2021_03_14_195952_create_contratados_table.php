<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratadosTable extends Migration
{
    public function up()
    {
        Schema::create('contratados', function (Blueprint $table) {
            $table->id();
            $table->string("posicion");
            $table->string("subdireccion");
            $table->string("grupo");
            $table->string("nivel");
            $table->string("categoria");
            $table->string("clasificacion");
            $table->text("motivo_vacante");
            $table->string("vigencia");
            $table->string("plaza");
            $table->string("eps");
            $table->string("gerencia");
            $table->string("area_integracion_valida");
            /* campos de desarrollo humano */
            $table->string("ficha");
            $table->string("profesion");
            $table->string("situacion_Contractual");
            $table->string("resultados_tecnicos");
            $table->string("nombre");
            $table->string("num_Cedula");
            $table->string("cpp");
            $table->string("dh_valida");
            /* departamento personal */
            $table->string('fecha_desbloqueo_plaza')->nullable();
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
        Schema::dropIfExists('contratados');
    }
}
