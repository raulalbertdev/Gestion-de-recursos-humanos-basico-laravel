<?php

namespace App\Http\Controllers\admin\DepartamentoPersonal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use App\Models\dataSearch;

class departamentoPersonalController extends Controller
{
    public $carta_no_inhabilitacion;
    public $path_cedula_siep;
    public $validacion_siep;
    public $resultados_ev_tec;
    public $clausula3;/* clausula 3 */
    /* Para el departamento Personal */
    public $memorandum_documento;
    public $cedula_siep_documento;
    public $path_documentos_adicionales;
    public function __construct()
    {
        $this->middleware('auth');
        $this->validacion_siep = '';
        $this->path_cedula_siep = '';
        $this->carta_no_inhabilitacion = '';
        $this->resultados_ev_tec = '';
        $this->memorandum_documento = '';
        $this->cedula_siep_documento = '';
    }

    public function index()
    {
        $departamentoPersonal = dataSearch::where('validacion_departamento_personal', 'false')->where('id_departamento_personal', '<>', null)->where('status_rechazo', '<>', 'true')->paginate(15);
        return view('pages.departamento-personal.departamento-personal-index', compact('departamentoPersonal'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        $request->validate([
            "ficha" => 'required|max:255',
            "profesion" => 'required|max:255',
            "situacion_contractual" => 'required|max:255',
            "resultados_tecnicos" => 'required|max:255',
            "nombre" => 'required|max:255',
            "num_cedula" => 'required|max:255',
            "cpp" => 'required|max:255',
            "dh_valida" => 'required|max:255',
            /* Archivos */
            'carta_no_inhabilitacion' => 'file|max:64000|mimes:pdf',
            'cedula_siep' => 'file|max:64000|mimes:pdf',
            'validacion_siep' => 'file|max:64000|mimes:pdf',
            'resultados_ev_tec' => 'file|max:64000|mimes:pdf',
            'files_especials' => 'array',
            'files_especials.*' => 'file|mimes:pdf|max:128000',
            /* archivos de clausula 3 */
            'memorandum_documento' => 'required|file|max:128000|mimes:pdf',
            'cedula_siep_documento' => 'required|file|max:128000|mimes:pdf',
            'archivos_adicionales_documentos' => 'array',
            'archivos_adicionales_documentos.*' => 'file|mimes:pdf|max:512000',
        ]);


        /* Creo un Nombre de Directorio o carpeta para guardar los archivos que me manda Desarrollo Humano */
        $Directorio = NameDirectory('desarrolloHumano');
        if ($request->hasFile('carta_no_inhabilitacion')) {
            $this->carta_no_inhabilitacion =  saveFile($request->file('carta_no_inhabilitacion'), 'departamento_personal/' . $Directorio . '/documentos_desarrollo_humano');
        }
        if ($request->hasFile('cedula_siep')) {
            $this->path_cedula_siep =  saveFile($request->file('cedula_siep'), 'departamento_personal/' . $Directorio . '/documentos_desarrollo_humano');
        }
        if ($request->hasFile('validacion_siep')) {
            $this->validacion_siep =  saveFile($request->file('validacion_siep'), 'departamento_personal/' . $Directorio . '/documentos_desarrollo_humano');
        }
        if ($request->hasFile('resultados_ev_tec')) {
            $this->resultados_ev_tec =  saveFile($request->file('resultados_ev_tec'), 'departamento_personal/' . $Directorio . '/documentos_desarrollo_humano');
        }
        /* Clausula 3 */
        if ($request->hasFile('files_especials')) {
            $this->resultados_evclausula3_tec = saveFile($request->file('files_especials'), 'departamento_personal/' . $Directorio . "/documentos_desarrollo_humano/clausula_3", true);
        }

        /* Documentos a Enviar al Departamento Personal */
        if ($request->hasFile('memorandum_documento')) {
            $this->memorandum_documento =  saveFile($request->file('memorandum_documento'), 'departamento_personal/' . $Directorio . '/para_departamento_personal');
        }
        if ($request->hasFile('cedula_siep_documento')) {
            $this->cedula_siep_documento =  saveFile($request->file('cedula_siep_documento'), 'departamento_personal/' . $Directorio . '/para_departamento_personal');
        }
        if ($request->hasFile('archivos_adicionales_documentos')) {
            $this->path_documentos_adicionales =  saveFile($request->file('archivos_adicionales_documentos'), 'departamento_personal/' . $Directorio . '/para_departamento_personal/documentos_adicionales', true);
        }
        /* Lo registro en el Departamento Personal */
        $newDepartamentoPersonal =  DepartamentoPersonal::create([
            "id_integracion" => $request->get('id_validacion_procedimiento'),
            "ficha" => $request->get('ficha'),
            "profesion" => $request->get('profesion'),
            "situacion_contractual" => $request->get('situacion_contractual'),
            "resultados_tecnicos" => $request->get('resultados_tecnicos'),
            "nombre" => $request->get('nombre'),
            "num_cedula" => $request->get('num_cedula'),
            "cpp" => $request->get('cpp'),
            "dh_valida" => $request->get("dh_valida"),
            "validacion" => 'false',
            "name_directory" => 'public/departamento_personal/' . $Directorio,
            "carta_no_inhabilitacion" => $this->carta_no_inhabilitacion,
            "cedula_siep" => $this->path_cedula_siep,
            "validacion_siep" => $this->validacion_siep,
            "resultados_ev_tec" => $this->path_cedula_siep,
            "documento1" => isset($this->clausula3[0]) ? $this->clausula3[0] : null,
            "documento2" => isset($this->clausula3[1]) ? $this->clausula3[1] : null,
            "documento3" => isset($this->clausula3[2]) ? $this->clausula3[2] : null,
            "documento4" => isset($this->clausula3[3]) ? $this->clausula3[3] : null,
            /* Documentos para enviar al Departamento Personal */
            "memorandum_documento" => $this->memorandum_documento,
            "cedula_siep_documento" => $this->cedula_siep_documento,
            "documento_1_adicional" => isset($this->path_documentos_adicionales[0]) ? $this->path_documentos_adicionales[0] : null,
            "documento_2_adicional" => isset($this->path_documentos_adicionales[1]) ? $this->path_documentos_adicionales[1] : null,
            "documento_3_adicional" => isset($this->path_documentos_adicionales[2]) ? $this->path_documentos_adicionales[2] : null,
            "documento_4_adicional" => isset($this->path_documentos_adicionales[3]) ? $this->path_documentos_adicionales[3] : null,
            "documento_5_adicional" => isset($this->path_documentos_adicionales[4]) ? $this->path_documentos_adicionales[4] : null,
            "documento_6_adicional" => isset($this->path_documentos_adicionales[5]) ? $this->path_documentos_adicionales[5] : null,
            "documento_7_adicional" => isset($this->path_documentos_adicionales[6]) ? $this->path_documentos_adicionales[6] : null,
        ]);

        $updateData =  dataSearch::where('id_desarrollo_humano', $request->get('id_registro_desarrollo_humano'))->get();
        $updateData[0]->id_departamento_personal = $newDepartamentoPersonal->id;
        $updateData[0]->validacion_desarrollo_humano = 'true';
        $updateData[0]->save();

        $update_validation_to_true = DesarrolloHumano::findOrFail($request->get('id_registro_desarrollo_humano'));
        $update_validation_to_true->validacion = 'true';
        $update_validation_to_true->save();
        return redirect()->route('desarrollo-humano.index')->with('status', 'Usuario registrado Correctamente!');
    }

    public function show($id)
    {
        $dataSearchResult = dataSearch::where('id_departamento_personal', $id)->get();
        $archivos_adicionales = DepartamentoPersonal::select('documento_1_adicional', 'documento_2_adicional', 'documento_3_adicional', 'documento_4_adicional', 'documento_5_adicional', 'documento_6_adicional', 'documento_7_adicional')->where('id', $id)->get();
        $archivos_adicionales_desarrollo_humana = DepartamentoPersonal::select("carta_no_inhabilitacion", "cedula_siep", "validacion_siep", "resultados_ev_tec", "documento1", "documento2", "documento3", "documento4")->where('id', $id)->get();
        $userDepartamentoPersonal = DepartamentoPersonal::findOrFail($id);
        $controls =  array(
            [
                'Name' => 'atributos_plaza',
                'Texto' => 'Atributos de Plaza',
                'Razon' => 'Sin atributos de plaza'
            ],
            [
                'Name' => 'vigencia',
                'Texto' => 'Vigencia',
                'Razon' => 'Ya no se encuentra vigente'
            ],
            [
                'Name' => 'puesto_siep',
                'Texto' => 'Puesto SIEP',
                'Razon' => 'No cumple con el puesto SIEP'
            ],
        );
        if ($userDepartamentoPersonal->validacion == 'true') {
            return abort(404);
        } else if ($userDepartamentoPersonal->validacion == 'false') {
            return view('pages.departamento-personal.departamento-personal-show', compact('userDepartamentoPersonal', 'archivos_adicionales', 'controls', 'archivos_adicionales_desarrollo_humana', 'dataSearchResult'));
        }
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
