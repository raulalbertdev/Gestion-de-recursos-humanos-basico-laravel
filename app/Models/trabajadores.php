<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajadores extends Model
{
    use HasFactory;
    protected $table = 'trabajadores';
    protected $fillable = [
        "posicion",
        "subdireccion",
        "grupo",
        "plaza",
        "gerencia",
        "ficha",
        "nombre",
        "rc",
        "eps",
        "nivel",
        "categoria",
        "clasificacion"
    ];
}
