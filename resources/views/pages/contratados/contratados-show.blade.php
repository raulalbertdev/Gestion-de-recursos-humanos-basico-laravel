@extends('adminlte::page')

@section('title', 'Ver Informacion Contratado')

@section('content_header')
    <h1>Contratación Aplicada</h1>
@stop

@section('content')
<x-informacion-contratado :controls="array(
    [
        'text' => 'ID',
        'value'=>$contratado->id
    ],
     [
        'text' => 'Posicion',
        'value'=>$contratado->posicion
    ],
     [
        'text' => 'Subdirección',
        'value'=>$contratado->subdireccion
    ],
    [
        'text' => 'Grupo',
        'value'=>$contratado->grupo
    ],
    [
        'text' => 'Nivel',
        'value'=>$contratado->nivel
    ],
    [
        'text' => 'Categoria',
        'value'=>$contratado->categoria
    ],
    [
        'text' => 'Clasificacion',
        'value'=>$contratado->clasificacion
    ],
    [
        'text' => 'Motivo de Vacante',
        'value'=>$contratado->motivo_vacante
    ],
     [
        'text' => 'Vigencia',
        'value'=>$contratado->vigencia
    ],
     [
        'text' => 'Plaza',
        'value'=>$contratado->plaza
    ],
    [
        'text' => 'EPS',
        'value'=>$contratado->eps
    ],
     [
        'text' => 'Gerencia',
        'value'=>$contratado->gerencia
    ],
    [
        'text' => 'Area de Integracion que Valida',
        'value'=>$contratado->area_integracion_valida
    ],
    [
        'text' => 'DH que Valida',
        'value'=>$contratado->dh_valida
    ],
     [
        'text' => 'Ficha',
        'value'=>$contratado->ficha
    ],
    [
        'text' => 'Profesión',
        'value'=>$contratado->profesion
    ],
    [
        'text' => 'Situacion Contractual',
        'value'=>$contratado->situacion_Contractual
    ],
    [
        'text' => 'Resultados Técnicos',
        'value'=>$contratado->resultados_tecnicos
    ],
    [
        'text' => 'Nombre',
        'value'=>$contratado->nombre
    ],
     [
        'text' => 'Numero de Cédula',
        'value'=>$contratado->num_Cedula
    ],
      [
        'text' => 'SIPAP',
        'value'=>$contratado->cpp
    ],
    [
    'text' => 'Fecha de desbloqueo de Plaza',
    'value' => $contratado->fecha_desbloqueo_plaza
    ],
)"></x-informacion-contratado>
@stop

@section('js')
@stop