@extends('adminlte::page')

@section('title', 'Contratados')

@section('content_header')
    <h1>Contratación Aplicada</h1>
@stop

@section('content')
 {{-- <x-search-component modelo="Departamento_Personal" route-redirect="departamento-personal.show" :campos="array(
                [
                    'text'=>'Ficha',
                    'value'=>'ficha'
                ],
                [
                    'text'=>'Nombre',
                    'value'=>'nombre'
                ]
            )"></x-search-component> --}}
             <section class="container my-2">
        <x-search-component modelo="Contratados" route-redirect="contratados.show" :campos="array(
               [
                    'text'=>'Plaza',
                    'value'=>'plaza'
                ],
                [
                    'text'=>'Nombre',
                    'value'=>'nombre',
                ],
                [
                    'text'=>'Ficha',
                    'value'=>'ficha',
                ],
            )"></x-search-component>
    </section>
@if (session('status'))
   
        <section class="container">
            <div class="alert alert-success text-center font-weight-bold" style="font-size: 22px;">
                {{ session('status') }}
            </div>
        </section>
        @endif
    <section class="container-fluid bg-light py-5">
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
        @foreach ($contratados as $item)
            <section class="row py-3">
                    <div class="col-1 text-center font-weight-bold" style="font-size: 21px;">
                        {{ $item->id }}
                    </div>
                    <div class="col-3">
                        <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-dark">{{$item->plaza}}</span></div>
                    </div>
                    <div class="col-3">
                        <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-dark">{{$item->ficha}}</span></div>
                    </div>
                    <div class="col-3">
                        <div class="container d-flex justify-content-center align-items-center"><span class="font-weight-bold text-dark">{{ $item->nombre }}</span></div>
                    </div>
                    <div class="col-2 d-flex justify-content-center">
                        <a href="{{ route('contratados.show', $item->id) }}" class="btn btn-success btn-block" title="Consultar Documentos e Informacion">Ver más...</a>
                    </div>
                </section>
            @endforeach
        <section class="container d-flex justify-content-center">
            {{ $contratados->links('vendor.pagination.default') }}
        </section>
    </section>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
@stop