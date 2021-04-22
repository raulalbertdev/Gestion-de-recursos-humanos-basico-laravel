<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function delete_file($Ruta)
{
    if (Storage::disk('local')->exists('public/' . $Ruta)) {
        return Storage::delete('public/' . $Ruta);
    }
}

function NameFile($File)
{
    return  time() . "_" . rand(50, 1000) . "_" . Str::random(15) . "_" . $File->getClientOriginalName();
}

function NameDirectory($FileDirectory)
{
    return time() . "_" . "FilePemex_" . $FileDirectory . Str::random(10) . rand(100, 1000);
}

function DownloadFiles($RouteFile)
{
    if (Storage::disk('local')->exists('public/' . $RouteFile)) {
        return Storage::download('public/' . $RouteFile);
    } else {
        return back()->with('errorFile', 'El Archivo No Se Emcontró para Su Descarga');
    }
}

/* function create_directory($Ruta, $FolderName)
{
    return \File::makeDirectory(public_path() . '/' . $Ruta . $FolderName);
}
 */

function saveFile($File, $Ruta, $files_adicionales = null)
{

    // if (Storage::disk('local')->exists('public/' . $Ruta)) {
    // /* echo Storage::makeDirectory('Nuevos_Archivos'); */
    // /* echo \File::makeDirectory(public_path() . '/public/integracion_regional/Nuevo_Archivo12'); */
    // /* echo create_directory('storage' . $Ruta, $NameDirectory); */
    // }
    $path_url = null;
    if ($files_adicionales == true) {
        $path_url = [];
        foreach ($File as $key => $file_for) {
            $NombreArchivo = NameFile($file_for);
            $file_for->storeAs('public/' . $Ruta, $NombreArchivo);
            array_push($path_url, $Ruta . "/" . $NombreArchivo);
        }
    } else if ($files_adicionales == null) {
        $path_url = '';
        $NameFile = NameFile($File);
        /* $NameDirectory = NameDirectory($File); */
        $File->storeAs('public/' . $Ruta, $NameFile);
        $path_url = $Ruta . "/" . $NameFile;
    }
    return $path_url;
}

function download_file($Ruta, $Name)
{
    if (Storage::disk('local')->exists($Ruta . $Name)) {
        return Storage::download($Ruta . $Name);
    }
    /* return 'public/' . $departamento  . '/' . $tipo . '/' .  $archivo; */
}


function Observaciones_No_Procedio($request, $departamento)
{

    /* La variable que formara el mensaje */
    $observaciones = '';

    /* Voy a validar cada una de las casillas manualmente */
    if ($departamento == 'Integracion Regional') {
        ($request->get('atributos_plaza') != null) ? $observaciones .= $request->get('atributos_plaza') . ', ' : null;
        ($request->get('vigencia') != null) ? $observaciones .= $request->get('vigencia') . ', ' : null;
        ($request->get('puesto_siep') != null) ? $observaciones .= $request->get('puesto_siep') . ', ' : null;
        ($request->get('acuerdo_cobertura') != null) ? $observaciones .= $request->get('acuerdo_cobertura') . ', ' : null;

        if ($request->get('atributos_plaza') == null && $request->get('vigencia') == null && $request->get('puesto_siep') == null && $request->get('motivos_check') == null && $request->get('acuerdo_cobertura') == null) {
            $observaciones = '- No se registró ningun Motivo -';
        }
    }
    if ($departamento == 'Desarrollo Humano') {
        ($request->get('memorandum') != null) ? $observaciones .= $request->get('memorandum') . ', ' : null;
        ($request->get('evaluacion_tecnica') != null) ? $observaciones .= $request->get('evaluacion_tecnica') . ', ' : null;
        ($request->get('ppp') != null) ? $observaciones .= $request->get('ppp') . ', ' : null;
        ($request->get('directorio_talento') != null) ? $observaciones .= $request->get('directorio_talento') . ', ' : null;
        ($request->get('carta_no_inhabilitacion') != null) ? $observaciones .= $request->get('carta_no_inhabilitacion') . ', ' : null;
        ($request->get('validacion_sep') != null) ? $observaciones .= $request->get('validacion_sep') . ', ' : null;
        ($request->get('fp') != null) ? $observaciones .= $request->get('fp') . ', ' : null;
        /* En caso de que no seleccionen ninguna casilla */
        if ($request->get('memorandum') == null && $request->get('evaluacion_tecnica') == null && $request->get('ppp') == null && $request->get('directorio_talento') == null && $request->get('carta_no_inhabilitacion') == null && $request->get('validacion_sep') == null && $request->get('motivos_check') == null) {
            $observaciones = '- No se registró ningun Motivo -';
        }
    }
    if ($request->has('motivos_check')) {
        $observaciones .= $request->get('otros_motivos');
    }
    return $observaciones;
}
