<?php

namespace App\Http\Controllers\admin\status;

use App\Http\Controllers\Controller;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\IntegracionRegional\Integracion;
use Illuminate\Http\Request;
/* Modelo de la busqueda principal */
use App\Models\dataSearch;
use App\Models\Rechazados;
use App\Models\Contratados;

class gestionStatus extends Controller
{
    public function index()
    {
        $getUsersForStatus = dataSearch::where('status_rechazo', '<>', 'true')->paginate(15);
        return view('pages.status.status-departamentos-index', compact(
            'getUsersForStatus',
        ));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    private function getInfoForStatus($id_candidato)
    {
        /* El ID que debo recibir como parametro debe ser el del Modelo DataSearch ya que se basa en los datos principales con los cuales identificamos un registro */
        $departamentoActual = null;
        $routeGo = null;
        $id_consultar = null;
        $getDataSearch = dataSearch::findOrFail($id_candidato);
        $getDataIntegracion = Integracion::where('id', $getDataSearch->id_integracion)->get();
        $getDataDesarrollo = DesarrolloHumano::where('id', $getDataSearch->id_desarrollo_humano)->get();
        $getDataDepartamentoPersonal = DepartamentoPersonal::where('id', $getDataSearch->id_departamento_personal)->get();


        if ($getDataSearch->status_rechazo === 'false') {
            if ($getDataIntegracion->first()) {
                if ($getDataIntegracion[0]->validacion === 'false') {
                    $departamentoActual = 'Integracion Regional';
                    $routeGo = 'integracion-regional.show';
                    $id_consultar =  $getDataIntegracion[0]->id;
                }
            }

            if ($getDataDesarrollo->first()) {
                if ($getDataDesarrollo[0]->validacion === 'false') {
                    $departamentoActual = 'Desarrollo Humano';
                    $routeGo = 'desarrollo-humano.show';
                    $id_consultar =  $getDataDesarrollo[0]->id;
                }
            }




            if ($getDataDepartamentoPersonal->first()) {
                if ($getDataDepartamentoPersonal[0]->validacion === 'false') {
                    $departamentoActual = 'Departamento Personal';
                    $routeGo = 'departamento-personal.show';
                    $id_consultar =  $getDataDepartamentoPersonal[0]->id;
                }
            }


            if ($getDataDepartamentoPersonal->first()) {
                if ($getDataDepartamentoPersonal[0]->validacion === 'true') {
                    $departamentoActual = 'Contratacion Aplicada';
                }
            }
        } else {
            $departamentoActual = 'Contratacion No Aplicada';
            /* $routeGo = 'rechazados.show'; */
            /* $id_consultar =  Rechazados::where('posicion', $getDataSearch->posicion)->get()[0]->id; */
        }
        return array(
            $departamentoActual,
            $routeGo,
            $id_consultar,
        );
    }
    public function show($id)
    /* El ID que debo recibir como parametro debe ser el del Modelo DataSearch ya que se basa en los datos principales con los cuales identificamos un registro */
    {
        $getDataSearch = dataSearch::findOrFail($id);
        $getDataIntegracion = Integracion::where('id', $getDataSearch->id_integracion)->get();
        $getDataDesarrollo = DesarrolloHumano::where('id', $getDataSearch->id_desarrollo_humano)->get();
        $getDataDepartamentoPersonal = DepartamentoPersonal::where('id', $getDataSearch->id_departamento_personal)->get();


        $isRechazado = dataSearch::where('id', $id)->where('status_rechazo', 'true')->get();

        if ($isRechazado->first()) {
            abort(404);
        }

        $getInformacionForStatus = $this->getInfoForStatus($id);
        $departamentoActualForStatus = $getInformacionForStatus[0];
        $rutaIr = $getInformacionForStatus[1];
        $idConsultarForStatus = $getInformacionForStatus[2];

        return view('pages.status.status-departamentos-show', compact(
            'departamentoActualForStatus',
            'rutaIr',
            'idConsultarForStatus',
            'getDataSearch',
            'getDataIntegracion',
            'getDataDesarrollo',
            'getDataDepartamentoPersonal'
        ));
    }

    public function edit($id)
    {
        //
    }

    private function updateDataForStatus($modelDta, $request)
    {
        $result = $modelDta->save([
            'status' => $request->get('status'),
        ]);
        return $result;
    }

    public function update(Request $request, $id)
    {
        $getDataDepartamentoForStatus = null;
        switch ($request->get('departamento')) {
            case 'Integracion Regional':
                $getDataDepartamentoForStatus = Integracion::findOrFail($id);
                $this->updateDataForStatus($getDataDepartamentoForStatus, $request);
                break;
            case 'Desarrollo Humano':
                $getDataDepartamentoForStatus = DesarrolloHumano::findOrFail($id);
                $this->updateDataForStatus($getDataDepartamentoForStatus, $request);
                break;
            case 'Departamento Personal':
                $getDataDepartamentoForStatus = DepartamentoPersonal::findOrFail($id);
                $this->updateDataForStatus($getDataDepartamentoForStatus, $request);
                break;
        }
        return json_encode(['resultado' => 'Los Datos fueron Actualizados Correctamente', 'status_update' => $getDataDepartamentoForStatus->status]);
    }

    public function destroy($id)
    {
        //
    }
}
