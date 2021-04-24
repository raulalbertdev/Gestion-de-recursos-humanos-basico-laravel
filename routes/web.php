<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/* Incluir cada uno de los controladores de Departamentos */
use App\Http\Controllers\admin\Usuaria\Usuaria;
use App\Http\Controllers\admin\IntegracionRegional\IntegracionRegional;
use App\Http\Controllers\admin\DesarrolloHumano\desarrolloHumanoController;
use App\Http\Controllers\admin\DepartamentoPersonal\departamentoPersonalController;
use App\Http\Controllers\admin\PDF\downloadPDF;
use App\Http\Controllers\admin\Rechazados\RechazadosController;
use App\Http\Controllers\admin\Contratados\ContratadosController;
use App\Http\Controllers\admin\search\searchController;
use App\Http\Controllers\admin\Trabajadores\trabajadoresController;
/* ETAPA 2 */
use App\Http\Controllers\admin\Etapa2\fechas;
/* Etapa 3 */
use App\Exports\UserExport;
use App\Http\Controllers\admin\Etapa3\reporteExcelCandidato;
/* Controlador Gestion y consulta de informacion de Status del trabajador en proceso de validaciones de departamento */
use App\Http\Controllers\admin\status\gestionStatus;
use App\Http\Controllers\consultarInformacionTablas;


use Illuminate\Support\Str;

Route::get('/', function () {
    return redirect()->route('area-usuaria');
});

Auth::routes();

Route::get('/usuaria', [Usuaria::class, 'home'])->name('area-usuaria');

Route::resource('integracion-regional', IntegracionRegional::class)->only(['index', 'store' , 'show']);

Route::resource('desarrollo-humano', desarrolloHumanoController::class)->only(['index', 'store' , 'show']);

Route::resource('departamento-personal', departamentoPersonalController::class)->only(['index', 'store' , 'show']);

Route::get('download-pdf/{id}/{departamento}/{file}', [downloadPDF::class, 'downloadPDF'])->name('download');

Route::get('download-word/{posicion}', [downloadPDF::class, 'getWordDesarrolloHumano'])->name('download-word-desarrollo-humano');

Route::get('resultados', [searchController::class, 'getSearchToConsulte'])->name('resultados-search');

Route::resource('rechazados', RechazadosController::class)->only(['index', 'store', 'show','destroy']);

Route::resource('contratados', ContratadosController::class)->only(['index', 'store', 'show']);

Route::post('/get-trabajador', [trabajadoresController::class, 'getInformacion']);

/* Departamento de Gestion de Status y Notificaciones */
Route::resource('/consultar-status', gestionStatus::class)->only(['index', 'getInfoForStatus', 'show', 'updateDataForStatus', 'update']);

/* ETAPA 2 */
Route::resource('proceso-fechas', fechas::class)->only(['index', 'show']);
/* ETAPA 3 */
Route::get('lista-contratados-generar-reporte', [reporteExcelCandidato::class, 'getCandidatoExcel'])->name('list-contratados-excel');
Route::get('descargar-reporte-excel/{id}', function ($id) {
    return (new UserExport($id))->download('reporte-' . Str::random(10) . $id . '.xlsx');
})->name('generar-reporte-excel-candidato');


/* Consumir con Ajax */
Route::post('/get-data-search', [consultarInformacionTablas::class, 'getDataSearch']);
Route::post('/get-data-departamento', [consultarInformacionTablas::class, 'getDataDepartamentForStatus']);
Route::post('/post-data-status', [consultarInformacionTablas::class, 'updatePostNewStatus']);
