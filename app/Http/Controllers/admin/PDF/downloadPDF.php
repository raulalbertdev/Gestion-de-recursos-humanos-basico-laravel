<?php

namespace App\Http\Controllers\admin\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* Incluir cada uno de los modelos */
use App\Models\admin\IntegracionRegional\Integracion;
use App\Models\admin\DesarrolloHumano\DesarrolloHumano;
use App\Models\admin\DepartamentoPersonal\DepartamentoPersonal;
use Illuminate\Support\Facades\Storage;
use App\Models\trabajadores;
use App\Models\Rechazados;

class downloadPDF extends Controller
{
    public $resultados;
    public function __construct()
    {
        $this->middleware('auth');
        $this->resultados = '';
    }
    public function downloadPDF($id, $departamento, $file)
    {
        /*$ id para consultar directamente en los registros */
        /* departamento para saber en que tabla ir a buscar */
        /* $file hace referencia al campo en el cual rescato la url del archivo a descargar */

        if ($departamento == 'integracion_regional') {
            $this->resultados = Integracion::findOrFail($id);
        }
        if ($departamento == 'desarrollo_humano') {
            $this->resultados = DesarrolloHumano::findOrFail($id);
        }
        if ($departamento == 'departamento_personal') {
            $this->resultados = DepartamentoPersonal::findOrFail($id);
        }
        if ($departamento == 'rechazados') {
            $this->resultados = Rechazados::findOrFail($id);
        }
        return DownloadFiles($this->resultados->$file);/* url */
    }

    public function getWordDesarrolloHumano($posicion)
    {
        $data = trabajadores::where('posicion', $posicion)->get();
        $template = new \PhpOffice\PhpWord\TemplateProcessor('word-desarrollo-humano/Notificacion_STPRM.docx');
        $template->setValue('plaza', $data[0]->plaza);
        $template->setValue('nivel', $data[0]->nivel);
        $template->setValue('categoria', $data[0]->categoria);
        $template->saveAs('notificacion_stprm_nuevo.docx');
        return response()->download('notificacion_stprm_nuevo.docx')->deleteFileAfterSend(true);
    }
}
