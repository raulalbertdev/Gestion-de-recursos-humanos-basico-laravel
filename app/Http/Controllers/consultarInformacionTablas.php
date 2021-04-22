<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataSearch;
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;

class consultarInformacionTablas extends Controller
{
    public function getDataSearch(Request $request)
    {
        $getDataSearchCandidato = dataSearch::findOrFail($request->get('id'));
        return json_encode([
            'dataSearch' => $getDataSearchCandidato
        ]);
    }


    public function getDataDepartamentForStatus(Request $request)
    {
        $dataResultSearchDepartament = null;

        switch ($request->get('departamento')) {
            case 'Integracion Regional':
                $dataResultSearchDepartament = Integracion::findOrFail($request->get('id'));
                break;
            case 'Desarrollo Humano':
                $dataResultSearchDepartament = DesarrolloHumano::findOrFail($request->get('id'));
                break;
            case 'Departamento Personal':
                $dataResultSearchDepartament = DepartamentoPersonal::findOrFail($request->get('id'));
                break;
        }
        return json_encode([
            'dataResultSearchDepartament' => $dataResultSearchDepartament
        ]);
    }

    /* Funcion para Modificar los datos en cuanto a la relacion del status */
    public function updatePostNewStatus(Request $request)
    {
        if ($request->get('departamento') == 'Integracion Regional') {

            $EncontrarTrabajadorIntegracion = Integracion::findOrFail($request->get('id'));
            $EncontrarTrabajadorIntegracion->status = $request->get('campo_status');
            $EncontrarTrabajadorIntegracion->save();
        }

        if ($request->get('departamento') == 'Desarrollo Humano') {

            $EncontrarTrabajadorIntegracion = DesarrolloHumano::findOrFail($request->get('id'));
            $EncontrarTrabajadorIntegracion->status = $request->get('campo_status');
            $EncontrarTrabajadorIntegracion->save();
        }

        if ($request->get('departamento') == 'Departamento Personal') {

            $EncontrarTrabajadorIntegracion = DepartamentoPersonal::findOrFail($request->get('id'));
            $EncontrarTrabajadorIntegracion->status = $request->get('campo_status');
            $EncontrarTrabajadorIntegracion->save();
        }

        return json_encode([
            'respuesta' => 'Los datos han sido guardados correctamente'
        ]);
    }
}
