<?php

namespace App\Models\admin\IntegracionRegional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integracion extends Model
{
    use HasFactory;
    protected $table = 'integracions';
    protected $fillable = [
        "id",
        "validacion",
        "name_directory",
        "memorandum",
        "documento_adicional_1",
        "documento_adicional_2",
        "documento_adicional_3",
        "documento_adicional_4",
        "documento_adicional_5",
        "documento_adicional_6",
        "documento_adicional_7",
    ];
}
