<?php

namespace App\Models\admin\DepartamentoPersonal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoPersonal extends Model
{
    use HasFactory;
    protected $table = 'departamento_personals';
    protected $fillable = [
        "id",
        "id_integracion",
        "ficha",
        "profesion",
        "situacion_contractual",
        "resultados_tecnicos",
        "nombre",
        "num_cedula",
        "cpp",
        "dh_valida",
        "validacion",
        "name_directory",
        "carta_no_inhabilitacion",
        "cedula_siep",
        "validacion_siep",
        "resultados_ev_tec",
        "documento1",
        "documento2",
        "documento3",
        "documento4",
        /* Documentos para Enviar al Departamento Personal */
        "memorandum_documento",
        "cedula_siep_documento",
        "documento_1_adicional",
        "documento_2_adicional",
        "documento_3_adicional",
        "documento_4_adicional",
        "documento_5_adicional",
        "documento_6_adicional",
        "documento_7_adicional",
    ];
}
