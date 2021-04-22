@extends('adminlte::page')

@section('title', 'Rechazados')

@section('content_header')
    <h1>Contratación No Procedencia</h1>
@stop

@section('content')
    <section class="container my-2">
        <x-search-component modelo="Rechazados" route-redirect="rechazados.show" :campos="array(
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
    </section>
    <section class="container">
        @if (session('status'))
            <div class="alert alert-success text-center font-weight-bold" style="font-size: 20px;">
                {{ session('status') }}
            </div>
        @endif
    </section>
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
            <div class="col-4 border border-white bg-dark">
                <div class="container d-flex justify-content-center align-items-center">
                    <span class="mx-2">Procedimiento</span>
                </div>
            </div>

        </section>
        @foreach ($rechazados as $item)
        <section class="row py-3">

                <div class="col-2 text-center font-weight-bold">
                    {{ $item->posicion }}
                </div>
                <div class="col-2 text-center font-weight-bold">
                    {{ $item->ficha }}
                </div>
                <div class="col-2 text-center font-weight-bold">
                    {{ $item->nombre }}
                </div>
                <div class="col-2 text-center font-weight-bold">
                    {{ $item->regimen_contractual }}
                </div>
                   <div class="col-4 text-justify">
                    <a href="{{  route('rechazados.show' , $item->id) }}" class="btn btn-success btn-block">Procedimiento...</a>
                </div>

            </section>
            @endforeach
        <section class="container d-flex justify-content-center">
            {{ $rechazados->links('vendor.pagination.default') }}
        </section>
    </section>

@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

{{-- @section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    $(document).ready(function () {
        bsCustomFileInput.init()
    })
@stop --}}