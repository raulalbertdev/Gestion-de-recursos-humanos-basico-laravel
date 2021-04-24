@extends('adminlte::page')

@section('title', 'Departamento Personal')

@section('content_header')
    <h1>Departamento Personal</h1>
@stop

@section('content')
 <x-search-component modelo="Departamento_Personal" route-redirect="departamento-personal.show" :campos="array(
                [
                    'text'=>'Posición',
                    'value'=>'posicion'
                ],
                [
                    'text'=>'Nombre',
                    'value'=>'nombre',
                ],
                [
                    'text'=>'Ficha',
                    'value'=>'ficha',
                ],
                [
                    'text'=>'Regimen Contractual',
                    'value'=>'regimen_contractual',
                ],
            )"></x-search-component>
@if (session('status'))
        <section class="container">
            <div class="alert alert-success text-center font-weight-bold" style="font-size: 22px;">
                {{ session('status') }}
            </div>
        </section>
        @endif
        @if (session('errorFile'))
             <section class="container">
            <div class="alert alert-danger text-center font-weight-bold" style="font-size: 22px;">
                {{ session('errorFile') }}
            </div>
        </section>
        @endif
    <section class="container-fluid bg-light py-5">
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
        @foreach ($departamentoPersonal as $item)
            <section class="row py-3">
                   
                <div class="col-2 text-center" style="font-size: 21px;">
                        {{ $item->posicion }}
                    </div>

                    <div class="col-2 text-center" style="font-size: 21px;">
                        {{ $item->ficha }}
                    </div>

                    <div class="col-2 text-center" style="font-size: 21px;">
                        {{ $item->nombre }}
                    </div>

                    <div class="col-2 text-center" style="font-size: 21px;">
                        {{ $item->regimen_contractual }}
                    </div>

                    <div class="col-2">
                        <a href="{{ route('departamento-personal.show', $item->id_departamento_personal) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
                    </div>

                    <div class="col-2">
                        <button class="btn btn-success btn-block" id="btnWatchStatus" data-element="WatchStatus" data-id-search="{{ $item->id }}" data-id-departament="{{ $item->id_departamento_personal }}" onclick="executeActivitiesDinamicForStatus(
                            {{$item->id_departamento_personal}},
                            '/get-data-departamento',
                            'Departamento Personal',
                            {{ $item->id }},
                            '/get-data-search',
                            'modalForStatusWatchOrEdit{{ $item->id_departamento_personal }}'
                        )">Ver Status...</button>
                    </div>

                </section>
                
                {{-- Modal For Status --}}
                <x-modal-for-status :idDataDepartament="$item->id_departamento_personal" routeRedirect="'/post-data-status'" departamento="'Departamento Personal'"></x-modal-for-status>


            @endforeach
        <section class="container d-flex justify-content-center">
            {{ $departamentoPersonal->links('vendor.pagination.default') }}
        </section>
    </section>
@stop
{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="{{ asset('js/forStatus/main.js') }}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
@stop