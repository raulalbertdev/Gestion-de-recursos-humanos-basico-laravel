<?php

namespace App\Http\Controllers\admin\search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\IntegracionRegional\Integracion;
/* use App\Models\admin\DesarrolloHumano\DesarrolloHumano; */
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use App\Models\Contratados;
use App\Models\Rechazados;
use App\Models\dataSearch;


class searchController extends Controller
{
    public $resultados_response;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getSearchToConsulte(Request $request)
    {
        switch ($request->get('modelo')) {
            case 'Integracion_Regional':
                $this->resultados_response = dataSearch::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->where('validacion_integracion', 'false')
                    ->where('status_rechazo', '<>', 'true')
                    ->get();
                break;
            case 'Desarrollo_Humano':
                $this->resultados_response = dataSearch::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->where('validacion_desarrollo_humano', 'false')
                    ->where('status_rechazo', '<>', 'true')
                    ->get();
                break;
            case 'Departamento_Personal':
                $this->resultados_response = dataSearch::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->where('validacion_departamento_personal', 'false')
                    ->where('status_rechazo', '<>', 'true')
                    ->get();
                break;
            case 'Etapa3':
                $this->resultados_response = Contratados::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->get();
                break;
            case 'Rechazados':
                $this->resultados_response = Rechazados::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->get();
                break;
            case 'Fechas':
                $this->resultados_response = dataSearch::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')->get();
                break;
            case 'Contratados':
                $this->resultados_response = Contratados::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')->get();
                break;
            case 'forStatus':
                $this->resultados_response = dataSearch::where($request->get('text_search'), 'like', '%' . $request->get('text') . '%')
                    ->where('status_rechazo', '<>', 'true')
                    ->get();
                break;
                /* default:
// 
                break; */
        }
        return view('search.resultados-busqueda', [
            'resultados' => $this->resultados_response,
            'routeConsult' => $request->get('route_consulta'),
            'nameModel' => $request->get('modelo')
        ]);
    }
}
