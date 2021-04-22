<?php

namespace App\Http\Controllers\admin\DesarrolloHumano;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\trabajadores;
use App\Models\dataSearch;

class desarrolloHumanoController extends Controller
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
        /* Obtengo todos los registros de Desarrollo Humano y los pagino, es decir, los ordeno 15 por cada página o representación por página */
        $desarrolloHumano = dataSearch::where('validacion_desarrollo_humano', 'false')->where('id_desarrollo_humano', '<>', null)->where('status_rechazo', '<>', 'true')->paginate(15);
        /* Devuelvo una vista o página con los registros que consulte anteriormente */
        return view('pages.desarrollo-humano.desarrollo-humano-index', compact('desarrolloHumano'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            "posicion" => 'required|max:255',
            "subdireccion" => 'required|max:255',
            "grupo" => 'required|max:255',
            "nivel" => 'required|max:255',
            "categoria" => 'required|max:255',
            "clasificacion" => 'required|max:255',
            "motivo_vacante" => 'required|max:255',
            "vigencia" => 'required|max:255',
            "plaza" => 'required|max:255',
            "eps" => 'required|max:255',
            "gerencia" => 'required|max:255',
            "juridiccion_plaza" => 'required|max:255',
            "area_integracion_valida" => 'required|max:255',
            'memorandum' => 'required|file|max:128000|mimes:pdf',
            'cedula_siep' => 'required|file|max:128000|mimes:pdf',
            'files_especials' => 'array',
            'files_especials.*' => 'file|mimes:pdf|max:768000',
        ]);
        /* Se crea un Nombre de Directorio o carpeta única para guardar los archivos de un usuario */
        $Directorio = NameDirectory('desarrolloHumano');
        if ($request->hasFile('memorandum')) {
            $this->path_memorandum =  saveFile($request->file('memorandum'), 'desarrollo_humano/' . $Directorio);
        }
        if ($request->hasFile('cedula_siep')) {
            $this->path_cedula_siep =  saveFile($request->file('cedula_siep'), 'desarrollo_humano/' . $Directorio);
        }
        if ($request->hasFile('files_especials')) {
            $this->path_files_adicionales = saveFile($request->file('files_especials'), 'desarrollo_humano/' . $Directorio . "/clausula3", true);
        }
        /* Se registra en el Departamento de Desarrollo Humano */
        $newDesarrolloHumano = DesarrolloHumano::create([
            "id_integracion" => $request->get('id_validacion_procedimiento'),
            "posicion" => $request->get('posicion'),
            "subdireccion" => $request->get('subdireccion'),
            "grupo" => $request->get('grupo'),
            "nivel" => $request->get('nivel'),
            "categoria" => $request->get('categoria'),
            "clasificacion" => $request->get('clasificacion'),
            "motivo_vacante" => $request->get('motivo_vacante'),
            "vigencia" => $request->get('vigencia'),
            "plaza" => $request->get('plaza'),
            "eps" => $request->get('eps'),
            "gerencia" => $request->get('gerencia'),
            "juridiccion_plaza" => $request->get('juridiccion_plaza'),
            "area_integracion_valida" => $request->get('area_integracion_valida'),
            "validacion" => 'false',
            "name_directory" => 'public/desarrollo_humano/' . $Directorio,
            'memorandum' => $this->path_memorandum,
            'cedula_siep' => $this->path_cedula_siep,
            'documento_adicional_1' => isset($this->path_files_adicionales[0]) ? $this->path_files_adicionales[0] : null,
            'documento_adicional_2' => isset($this->path_files_adicionales[1]) ? $this->path_files_adicionales[1] : null,
            'documento_adicional_3' => isset($this->path_files_adicionales[2]) ? $this->path_files_adicionales[2] : null,
            'documento_adicional_4' => isset($this->path_files_adicionales[3]) ? $this->path_files_adicionales[3] : null,
            'documento_adicional_5' => isset($this->path_files_adicionales[4]) ? $this->path_files_adicionales[4] : null,
            'documento_adicional_6' => isset($this->path_files_adicionales[5]) ? $this->path_files_adicionales[5] : null,
            'documento_adicional_7' => isset($this->path_files_adicionales[6]) ? $this->path_files_adicionales[6] : null,
        ]);

        $updateData =  dataSearch::where('id_integracion', $request->get('id_validacion_procedimiento'))->get();
        $updateData[0]->id_desarrollo_humano = $newDesarrolloHumano->id;
        $updateData[0]->validacion_integracion = 'true';
        $updateData[0]->save();

        $update_validation_to_true = Integracion::findOrFail($request->get('id_validacion_procedimiento'));
        $update_validation_to_true->validacion = 'true';
        $update_validation_to_true->save();
        /* Se redireccion al mismo Departamentro de Integracion Regional con un mensaje de que el Usuario fue registrado correctamente */
        return redirect()->route('integracion-regional.index')->with('status', 'Usuario registrado Correctamente!');
    }

    public function show($id)
    {
        $dataSearchResult = dataSearch::where('id_desarrollo_humano', $id)->get();
        $archivos_adicionales = DesarrolloHumano::select('documento_adicional_1', 'documento_adicional_2', 'documento_adicional_3', 'documento_adicional_4', 'documento_adicional_5', 'documento_adicional_6', 'documento_adicional_7')->where('id', $id)->get();
        $userDesarrolloHumano = DesarrolloHumano::findOrFail($id);
        $controls =  array(
            [
                'Name' => 'memorandum',
                'Texto' => 'Memorandum',
                'Razon' => 'No cumple con el Memorandum'
            ],
            [
                'Name' => 'evaluacion_tecnica',
                'Texto' => 'Evaluacion Técnica',
                'Razon' => 'No cumple con la Evaluacion Tecnica'
            ],
            [
                'Name' => 'directorio_talento',
                'Texto' => 'Directorio Talento',
                'Razon' => 'Sin del Directorio Talento'
            ],
            [
                'Name' => 'pp',
                'Texto' => 'PPP',
                'Razon' => 'Sin PPP'
            ],
            [
                'Name' => 'carta_no_inhabilitacion',
                'Texto' => 'Carta de No Inhabilitación',
                'Razon' => 'Sin carta de No Inhabilitacion'
            ],
            [
                'Name' => 'validacion_sep',
                'Texto' => 'Validacion SIEP',
                'Razon' => 'Sin Validacion SIEP'
            ],
        );
        if ($userDesarrolloHumano->validacion == 'true') {
            return abort(404);
        } else if ($userDesarrolloHumano->validacion == 'false') {
            return view('pages.desarrollo-humano.desarrollo-humano-show', compact('userDesarrolloHumano', 'archivos_adicionales', 'controls', 'dataSearchResult'));
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
