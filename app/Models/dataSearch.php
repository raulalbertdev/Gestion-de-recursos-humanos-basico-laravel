<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataSearch extends Model
{
    use HasFactory;
    protected $table = 'data_searches';
    protected $fillable = [
        "posicion",
        "ficha",
        "nombre",
        "regimen_contractual",
        "id_integracion",
        "validacion_integracion",
        "id_desarrollo_humano",
        "validacion_desarrollo_humano",
        "id_departamento_personal",
        "validacion_departamento_personal",
    ];
}
