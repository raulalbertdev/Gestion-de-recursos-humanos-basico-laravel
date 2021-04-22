@extends('adminlte::page')

@section('title', 'Status e Informacion del Candidato')

@section('content_header')
    <h1>Proceso y Status de Candidatos</h1>
@stop

@section('content')

            <div class="container my-2">
                <x-search-component modelo="forStatus" route-redirect="consultar-status.show" :campos="array(
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
            </div>

            <div class="container my-3">
                <small class="d-block mx-auto text-center font-weight-bold" style="font-size: 14px;">* Se mostrarán todos los candidatos que se encuentren en Integracion Regional, Desarrollo Humano o Departamento Personal *</small>
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
             @foreach ($getUsersForStatus as $item)
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
                        <a href="{{ route('consultar-status.show', $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Ver más...</a>
                    </div>

                </section>
            @endforeach

                {{-- Paginacion --}}
                 <section class="container d-flex justify-content-center">
                        {{ $getUsersForStatus->links('vendor.pagination.default') }}
                    </section>

@stop

@section('js')
    
@stop

@section('css')
    
@stop