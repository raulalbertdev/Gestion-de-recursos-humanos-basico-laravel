<?php

namespace App\Http\Controllers\admin\IntegracionRegional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\trabajadores;
use App\Models\dataSearch;

class IntegracionRegional extends Controller
{
    public $path_files_adicionales;
    public $path_memorandum;
    public $path_cedula_siep;
    public function __construct()
    {
        $this->middleware('auth');
        $this->path_files_adicionales  = [];
        $this->path_cedula_siep = '';
        $this->path_memorandum = '';
    }

    public function index()
    {
        $integracion = dataSearch::where('validacion_integracion', 'false')->where('id_integracion', '<>', null)->where('status_rechazo', '<>', 'true')->paginate(15);
        return view('pages.integracion-regional.integracion-regional-index', compact('integracion'));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {

        /* Validaciones */
        $request->validate([
            "posicion" => 'required|max:255',
            "ficha" => 'required|max:255',
            "nombre" => 'required|max:255',
            "regimen_contractual" => 'required|max:255',
            'memorandum' => 'required|file|mimes:pdf|max:256000',
            'files_especials' => 'array',
            'files_especials.*' => 'file|mimes:pdf|max:768000'
        ]);

        /* La peticion surge desde la area Usuaria, que envia una serie de datos de POST, para que lo registre directamente en Integracion */
        $Directorio = NameDirectory('RaulMohenoZavaleta');
        if ($request->hasFile('memorandum')) {
            $this->path_memorandum =  saveFile($request->file('memorandum'), 'integracion_regional/' . $Directorio);
        }
        /*  if ($request->hasFile('cedula_siep')) {
            $this->path_cedula_siep =  saveFile($request->file('cedula_siep'), 'integracion_regional/' . $Directorio);
        } */
        if ($request->hasFile('files_especials')) {
            $this->path_files_adicionales = saveFile($request->file('files_especials'), 'integracion_regional/' . $Directorio . "/documentos_adicionales", true);
        }

        /* Registrar en la base de datos */

        $dataSearchReference = Integracion::create([
            'validacion' => 'false',
            "name_directory" => 'public/integracion_regional/' . $Directorio,
            'memorandum' => $this->path_memorandum,
            /* 'cedula_siep' => $this->path_cedula_siep, */
            'documento_adicional_1' => isset($this->path_files_adicionales[0]) ? $this->path_files_adicionales[0] : null,
            'documento_adicional_2' => isset($this->path_files_adicionales[1]) ? $this->path_files_adicionales[1] : null,
            'documento_adicional_3' => isset($this->path_files_adicionales[2]) ? $this->path_files_adicionales[2] : null,
            'documento_adicional_4' => isset($this->path_files_adicionales[3]) ? $this->path_files_adicionales[3] : null,
            'documento_adicional_5' => isset($this->path_files_adicionales[4]) ? $this->path_files_adicionales[4] : null,
            'documento_adicional_6' => isset($this->path_files_adicionales[5]) ? $this->path_files_adicionales[5] : null,
            'documento_adicional_7' => isset($this->path_files_adicionales[6]) ? $this->path_files_adicionales[6] : null,
        ]);

        /* Primero lo registramos en la dataSearch para que pueda funcionar como referencia la informacion para el cuadro de busqueda */
        dataSearch::create([
            "posicion" => $request->get('posicion'),
            "ficha" => $request->get('ficha'),
            "nombre" => $request->get('nombre'),
            "regimen_contractual" => $request->get('regimen_contractual'),
            "id_integracion" => $dataSearchReference->id,
            "id_desarrollo_humano" => null,
            "id_departamento_personal" => null,
        ]);
        /* Redireccionar a la Misma area Usuaria con un mensaje que valido con session('status') */
        return redirect()->route('area-usuaria')->with('status', 'Usuario registrado Correctamente!');
    }

    public function show($id)
    {
        /* $userIntegracion = Integracion::where('validacion', 'false')->get(); */
        $dataSearchResults = dataSearch::where('id_integracion', $id)->get();
        $archivos_adicionales = Integracion::select('documento_adicional_1', 'documento_adicional_2', 'documento_adicional_3', 'documento_adicional_4', 'documento_adicional_5', 'documento_adicional_6', 'documento_adicional_7')->where('id', $id)->get();
        $userIntegracion = Integracion::findOrFail($id);
        $controls =  array(
            [
                'Name' => 'acuerdo_cobertura',
                'Texto' => 'Acuerdo de Cobertura',
                'Razon' => 'Sin acuerdo de cobertura'
            ],
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
        if ($userIntegracion->validacion == 'true') {
            return abort(404);
        } else if ($userIntegracion->validacion == 'false') {
            return view('pages.integracion-regional.integracion-regional-show', compact('userIntegracion', 'archivos_adicionales', 'controls', 'id', 'dataSearchResults'));
        }
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
