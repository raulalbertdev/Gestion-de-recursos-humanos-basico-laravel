@extends('adminlte::page')

@section('title', 'Resultados de Búsqueda')

@section('content_header')
    <h1>Resultados Busqueda en {{ $nameModel }}</h1>
@stop

@section('content')
    {{-- <section class="container d-flex justify-content-end"> --}}
        {{-- <a class="btn btn-success btn-md my-3" href="{{ backPage() }}">Regresar</a> --}}
    {{-- </section> --}}
    <section class="container-fluid bg-light py-5">
        @if ($nameModel == 'Integracion_Regional')

            <div class="d-flex justify-content-end">
                <a href="{{ route('integracion-regional.index') }}" class="btn btn-primary btn-md my-3 mr-3">Regresar...</a>
            </div>
            <section class="row">

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Posicion</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Ficha</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Nombre</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Regimen Contractual</span>
                </div>

                <div class="col-2 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
                </div>

                <div class="col-2 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Ver/Modificar Status....</span></div>
                </div>
            </section>
             @foreach ($resultados as $item)
                <section class="row py-3">

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->posicion }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->ficha }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->nombre }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->regimen_contractual }}
                    </div>
                    
                    <div class="col-2">
                        <a href="{{ route($routeConsult, $item->id_integracion) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                    </div>

                     <div class="col-2">
                        <button class="btn btn-success btn-block" id="btnWatchStatus" data-element="WatchStatus" data-id-search="{{ $item->id }}" data-id-departament="{{ $item->id_integracion }}" onclick="executeActivitiesDinamicForStatus(
                            {{$item->id_integracion}},
                            '/get-data-departamento',
                            'Integracion Regional',
                            {{ $item->id }},
                            '/get-data-search',
                            'modalForStatusWatchOrEdit'
                        )">Ver Status...</button>
                    </div>

                </section>

                <x-modal-for-status :idDataDepartament="$item->id_integracion" routeRedirect="'/post-data-status'" departamento="'Integracion Regional'"></x-modal-for-status>
            @endforeach
        @endif
        {{-- --- --}}
        @if ($nameModel == 'Desarrollo_Humano')
                
                <div class="d-flex justify-content-end">
                    <a href="{{ route('desarrollo-humano.index') }}" class="btn btn-primary btn-md my-3 mr-3">Regresar...</a>
                </div>

                <section class="row">

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Posicion</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Ficha</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Nombre</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Regimen Contractual</span>
                </div>

                <div class="col-2 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
                </div>

                <div class="col-2 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Ver/Modificar Status....</span></div>
                </div>

            </section>
             @foreach ($resultados as $item)
                <section class="row py-3">

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->posicion }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->ficha }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->nombre }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->regimen_contractual }}
                    </div>
                    
                    <div class="col-2">
                        <a href="{{ route($routeConsult, $item->id_desarrollo_humano) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                    </div>

                    <div class="col-2">
                        <button class="btn btn-success btn-block" id="btnWatchStatus" data-element="WatchStatus" data-id-search="{{ $item->id }}" data-id-departament="{{ $item->id_desarrollo_humano }}" onclick="executeActivitiesDinamicForStatus(
                            {{$item->id_desarrollo_humano}},
                            '/get-data-departamento',
                            'Desarrollo Humano',
                            {{ $item->id }},
                            '/get-data-search',
                            'modalForStatusWatchOrEdit'
                        )">Ver Status...</button>
                    </div>

                </section>

                <x-modal-for-status :idDataDepartament="$item->id_desarrollo_humano" routeRedirect="'/post-data-status'" departamento="'Desarrollo Humano'"></x-modal-for-status>
            @endforeach

        @endif
        {{-- --- --}}
        @if ($nameModel == 'Departamento_Personal')
        
                <div class="d-flex justify-content-end">
                    <a href="{{ route('departamento-personal.index') }}" class="btn btn-primary btn-md my-3 mr-3">Regresar...</a>
                </div>

                <section class="row">

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Posicion</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Ficha</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Nombre</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Regimen Contractual</span>
                </div>

                <div class="col-2 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
                </div>

                <div class="col-2 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Ver/Modificar Status....</span></div>
                </div>

            </section>
             @foreach ($resultados as $item)
                <section class="row py-3">

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->posicion }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->ficha }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->nombre }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->regimen_contractual }}
                    </div>
                    
                    <div class="col-2">
                        <a href="{{ route($routeConsult, $item->id_departamento_personal) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                    </div>

                    <div class="col-2">
                        <button class="btn btn-success btn-block" id="btnWatchStatus" data-element="WatchStatus" data-id-search="{{ $item->id }}" data-id-departament="{{ $item->id_departamento_personal }}" onclick="executeActivitiesDinamicForStatus(
                            {{$item->id_departamento_personal}},
                            '/get-data-departamento',
                            'Departamento Personal',
                            {{ $item->id }},
                            '/get-data-search',
                            'modalForStatusWatchOrEdit'
                        )">Ver Status...</button>
                    </div>

                </section>

            <x-modal-for-status :idDataDepartament="$item->id_departamento_personal" routeRedirect="'/post-data-status'" departamento="'Departamento Personal'"></x-modal-for-status>

            @endforeach

        @endif
       @if ($nameModel == 'Etapa3')

            <div class="d-flex justify-content-end">
                <a href="{{ route('list-contratados-excel') }}" class="btn btn-primary btn-md my-3 mr-3">Regresar...</a>
            </div>
       
           <section class="row">
            <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">Posicion</span>
            </div>
            <div class="col-2 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Ficha</span></div>
            </div>
            <div class="col-2 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Nombre</span></div>
            </div>
            <div class="col-2 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Plaza</span></div>
            </div>
            <div class="col-4 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Reporte Excel</span></div>
            </div>
        </section>
            @foreach ($resultados as $item)
                <section class="row py-3">

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->posicion }}
                    </div>
                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->ficha }}
                    </div>
                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->nombre }}
                    </div>
                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->plaza }}
                    </div>
                    <div class="col-3">
                        <a href="{{ route($routeConsult, $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Descargar Reporte Excel...</a>
                    </div>
                </section>
                @endforeach
       @endif

       @if ($nameModel == 'Fechas')

                <div class="d-flex justify-content-end">
                    <a href="{{ route('proceso-fechas.index') }}" class="btn btn-primary btn-md my-3 mr-3">Regresar...</a>
                </div>

          <section class="row">

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Posicion</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Ficha</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Nombre</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Regimen Contractual</span>
                </div>

                <div class="col-4 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Ver Seguimiento...</span></div>
                </div>

            </section>
             @foreach ($resultados as $item)
                <section class="row py-3">

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->posicion }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->ficha }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->nombre }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->regimen_contractual }}
                    </div>
                    
                    <div class="col-4">
                        <a href="{{ route($routeConsult, $item->id_integracion) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                    </div>

                </section>
            @endforeach
       @endif
        {{-- <section class="container d-flex justify-content-center">
            {{ $integracion->links('vendor.pagination.default') }}
        </section> --}}

        @if ($nameModel == 'Contratados')

            <div class="d-flex justify-content-end">
                <a href="{{ route('contratados.index') }}" class="btn btn-primary btn-md my-3 mr-3">Regresar...</a>
            </div>
       
           <section class="row">
               <div class="col-1 border border-white bg-dark d-flex justify-content-center align-items-center">
                <span class="font-weight-bold text-white">ID</span>
            </div>
            <div class="col-3 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Plaza</span></div>
            </div>
            <div class="col-3 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Ficha</span></div>
            </div>
            <div class="col-3 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Nombre</span></div>
            </div>
            
            <div class="col-2 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
            </div>
        </section>
            @foreach ($resultados as $item)
                <section class="row py-3">
                    <div class="col-1 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->id }}
                    </div>
                    <div class="col-3 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->plaza }}
                    </div>
                    <div class="col-3 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->nombre }}
                    </div>
                    <div class="col-3 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->ficha }}
                    </div>
                    <div class="col-2">
                        <a href="{{ route($routeConsult, $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Ver más...</a>
                    </div>
                </section>
                @endforeach
       @endif


        @if ($nameModel == 'Rechazados')

            <div class="d-flex justify-content-end">
                <a href="{{ route('rechazados.index') }}" class="btn btn-primary btn-md my-3 mr-3">Regresar...</a>
            </div>
            <section class="row">

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Posicion</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Ficha</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Nombre</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Regimen Contractual</span>
                </div>

                <div class="col-4 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
                </div>

            </section>
             @foreach ($resultados as $item)
                <section class="row py-3">

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->posicion }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->ficha }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->nombre }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->regimen_contractual }}
                    </div>
                    
                    <div class="col-4">
                        <a href="{{ route($routeConsult, $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                    </div>

                </section>
            @endforeach
        @endif

          @if ($nameModel == 'forStatus')

            <div class="d-flex justify-content-end">
                <a href="{{ route('consultar-status.index') }}" class="btn btn-primary btn-md my-3 mr-3">Regresar...</a>
            </div>
            <section class="row">

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Posicion</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Ficha</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Nombre</span>
                </div>

                <div class="col-2 border border-white bg-dark d-flex justify-content-center align-items-center">
                    <span class="font-weight-bold text-white">Regimen Contractual</span>
                </div>

                <div class="col-4 border border-white bg-dark">
                    <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-white">Proceso de Documentacion</span></div>
                </div>

            </section>
             @foreach ($resultados as $item)
                <section class="row py-3">

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->posicion }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->ficha }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->nombre }}
                    </div>

                    <div class="col-2 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->regimen_contractual }}
                    </div>
                    
                    <div class="col-4">
                        <a href="{{ route($routeConsult, $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                    </div>

                </section>
            @endforeach
        @endif




    </section>

@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
<script src="{{ asset('js/forStatus/main.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    $(document).ready(function () {
        bsCustomFileInput.init()
    }) --}}
@stop