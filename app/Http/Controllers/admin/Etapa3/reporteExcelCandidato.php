<?php

namespace App\Http\Controllers\admin\Etapa3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contratados;

class reporteExcelCandidato extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getCandidatoExcel()
    {
        $lista_contratados_reporte = Contratados::paginate(25);
        return view('pages.Etapa3.list-users', compact('lista_contratados_reporte'));
    }
}
