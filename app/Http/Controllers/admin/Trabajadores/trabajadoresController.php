<?php

namespace App\Http\Controllers\admin\Trabajadores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\trabajadores;
use Illuminate\Support\Facades\Storage;

class trabajadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getInformacion(Request $request)
    {
        /* Debo recibir una posicion */
        if ($request->get('concepto') == 'posicion') {
            $trabajador = trabajadores::where('posicion',  $request->get('posicion'))->get();
        }
        if ($request->get('concepto') == 'ficha') {
            $trabajador = trabajadores::where('ficha',  $request->get('ficha'))->get();
        }
        return json_encode($trabajador);
    }
}
