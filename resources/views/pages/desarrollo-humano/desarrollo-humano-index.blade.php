@extends('adminlte::page')

@section('title', 'Desarrollo Humano')

@section('content_header')
    <h1>Desarrollo Humano</h1>
@stop

@section('content')
 <x-search-component modelo="Desarrollo_Humano" route-redirect="desarrollo-humano.show" :campos="array(
              [
                    'text'=>'Posicion',
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
    <section class="container">
        @if (session('status'))
            <div class="alert alert-success text-center font-weight-bold" style="font-size: 22px;">
                {{ session('status') }}
            </div>
        @endif
    </section>
    {{-- --------------------- --}}
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
        @foreach ($desarrolloHumano as $item)
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
                    <a href="{{ route('desarrollo-humano.show', $item->id_desarrollo_humano) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Validacion...</a>
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

            {{-- Modal For Status --}}
            <x-modal-for-status :idDataDepartament="$item->id_desarrollo_humano" routeRedirect="'/post-data-status'" departamento="'Desarrollo Humano'"></x-modal-for-status>

            @endforeach


        <section class="container d-flex justify-content-center">
            {{ $desarrolloHumano->links('vendor.pagination.default') }}
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