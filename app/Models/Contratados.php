<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratados extends Model
{
    use HasFactory;
    protected $table = 'contratados';
    protected $fillable = [
        "id",
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
        "area_integracion_valida",
        /* campos de desarrollo humano */
        "ficha",
        "profesion",
        "situacion_Contractual",
        "resultados_tecnicos",
        "nombre",
        "num_Cedula",
        "cpp",
        "dh_valida",
        "fecha_desbloqueo_plaza"
    ];
}
