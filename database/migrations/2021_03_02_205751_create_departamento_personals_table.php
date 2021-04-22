<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento_personals', function (Blueprint $table) {
            $table->id();
            $table->string("id_integracion")->nullable();
            $table->string("ficha")->nullable();
            $table->string("profesion")->nullable();
            $table->string("situacion_contractual")->nullable();
            $table->string("resultados_tecnicos")->nullable();
            $table->string("nombre")->nullable();
            $table->string("num_cedula")->nullable();
            $table->string("cpp")->nullable();
            $table->string('dh_valida')->nullable();
            $table->string("validacion")->default('false');
            $table->text("name_directory");
            /* Documentos para guardar en la carpeta correspondiente */
            $table->text("carta_no_inhabilitacion")->nullable();
            $table->text("cedula_siep")->nullable();
            $table->text("validacion_siep")->nullable();
            $table->text("resultados_ev_tec")->nullable();
            $table->text("documento1")->nullable();
            $table->text("documento2")->nullable();
            $table->text("documento3")->nullable();
            $table->text("documento4")->nullable();
            /* Documentos que recibe Departamento Personañ */
            $table->text("memorandum_documento")->nullable();
            $table->text("cedula_siep_documento")->nullable();
            $table->text("documento_1_adicional")->nullable();
            $table->text("documento_2_adicional")->nullable();
            $table->text("documento_3_adicional")->nullable();
            $table->text("documento_4_adicional")->nullable();
            $table->text("documento_5_adicional")->nullable();
            $table->text("documento_6_adicional")->nullable();
            $table->text("documento_7_adicional")->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('departamento_personals');
    }
}
