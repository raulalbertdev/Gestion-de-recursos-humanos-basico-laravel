<?php

namespace App\Models\admin\DesarrolloHumano;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesarrolloHumano extends Model
{
    use HasFactory;
    protected $table = 'desarrollo_humanos';
    protected $fillable = [
        "id",
        "id_integracion",
        "posicion",
        "subdireccion",
        "grupo",
        "nivel",
        "categoria",
        "clasificacion",
        "motivo_vacante",
        "vigencia",
        "plaza",
        "eps",
        "gerencia",
        "juridiccion_plaza",
        "area_integracion_valida",
        "validacion",
        "name_directory",
        "memorandum",
        "cedula_siep",
        "documento_adicional_1",
        "documento_adicional_2",
        "documento_adicional_3",
        "documento_adicional_4",
        "documento_adicional_5",
        "documento_adicional_6",
        "documento_adicional_7",
    ];
}
