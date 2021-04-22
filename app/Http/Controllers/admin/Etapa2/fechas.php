<?php

namespace App\Http\Controllers\admin\Etapa2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/* Cada uno de los departamentos */
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use App\Models\dataSearch;

use App\Models\Contratados;

class fechas extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        /* Retorno la lista en base a los registros de Integracion Regional, ya que desde ahi se comienza el proceso */
        $integrantes_proceso = dataSearch::where('status_rechazo', '<>', 'true')->paginate(15);
        return view('pages.etapa2.listado-candidatos', compact('integrantes_proceso'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $proceso_integracionRegional = Integracion::findOrFail($id);
        $proceso_desarrolloHumano = DesarrolloHumano::where('id_integracion', $id)->get();
        $proceso_departamentoPersonal = DepartamentoPersonal::where('id_integracion', $id)->get();
        $dataSearhFechas = dataSearch::where('id_integracion', $proceso_integracionRegional->id)->get();
        return view('pages.etapa2.fechas-candidato', compact('proceso_integracionRegional', 'proceso_desarrolloHumano', 'proceso_departamentoPersonal', 'dataSearhFechas'));
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
