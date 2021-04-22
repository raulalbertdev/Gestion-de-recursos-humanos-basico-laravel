@extends('adminlte::page')

@section('title', 'Validacion')

@section('content_header')
    <h1>Consulta de Información y Estatus:  {{ $getDataSearch->nombre }}</h1>
@stop

@section('content')
    <main data-title="Informacion del Status del Candidato">
        <section class="container bg-light">
            <div data-title="Informacion del Candidato">

                <p class="h2 text-center font-weight-bold my-3">Información del Candidato</p>

                    <div class="row">
                            <div class="col-6 my-4">
                            <p class="text-center">Nombre: <strong>{{ $getDataSearch->nombre }}</strong></p>
                            </div>
                            <div class="col-6 my-4">
                                <p class="text-center">Posicion: <strong>{{ $getDataSearch->posicion }}</strong></p>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-6 my-4">
                                <p class="text-center">Ficha: <strong>{{ $getDataSearch->ficha }}</strong></p>
                            </div>
                            <div class="col-6 my-4">
                                <p class="text-center">Regimen Contractual: <strong>{{ $getDataSearch->regimen_contractual }}</strong></p>
                            </div>
                    </div>
                    
                    {{-- Departamento Actual --}}
                    <div data-title="Departamento en el que se Encuentra">
                        <p class="text-center">Departamento actual en validación:  
                            <strong>{{ $departamentoActualForStatus }}</strong>
                        </p>

                        <section class="container my-2" data-title="Navegar hasta el proceso de validación en departamento actual">
                            <div class="w-75 d-block mx-auto ">
                                @if ( $rutaIr != null || $rutaIr != [] )
                                    @if ( $departamentoActualForStatus != 'Contratacion Aplicada' || $departamentoActualForStatus != 'Contratacion No Aplicada' )
                                     <a href="{{ route($rutaIr, $idConsultarForStatus) }}" class="btn btn-success btn-block ">Ir al Departamento en Validación</a>
                                    @endif
                                @endif

                                  @if ( $departamentoActualForStatus == 'Contratacion Aplicada' )
                                    <p class="text-center font-weight-bold text-primary">*Esta persona ya ha sido contratada*</p>  
                                  @endif

                                  @if ( $departamentoActualForStatus == 'Contratacion No Aplicada' )
                                    <p class="text-center font-weight-bold text-primary">*Por ciertos Motivos, esta persona ha sido rechazado del proceso de validación*</p>  
                                  @endif
                            </div>
                        </section>

                    </div>

                   
                    {{-- Motivos o Razones del Status --}}
                    <section class="container my-4" data-title="Información Sobre el Status en cada proceso de validación">
                         <hr>
                        <p class="h2 font-weight-bold text-center py-3">En Integracion Regional</p>
                        @if ($getDataIntegracion->first())
                            <p class="text-center">
                                Status: <strong>{{ ($getDataIntegracion[0]->status != null) ? $getDataIntegracion[0]->status : 'No Hay Información Disponible' }}</strong>
                            </p>
                             @else
                            <p class="text-center font-weight-bold">*Este candidato aun no está presente en este Departamento*</p>
                        @endif

                            <hr>

                            <p class="h2 font-weight-bold text-center py-3">En Desarrollo Humano</p>
                            @if ($getDataDesarrollo->first())
                            <p class="text-center">
                                Status: <strong>{{ ($getDataDesarrollo[0]->status != null) ? $getDataDesarrollo[0]->status : 'No Hay Información Disponible' }}</strong>
                            </p>
                            @else
                            <p class="text-center font-weight-bold">*Este candidato aun no está presente en este Departamento*</p>
                        @endif

                        <hr>

                            <p class="h2 font-weight-bold text-center py-3">En Departamento Personal</p>
                            @if ($getDataDepartamentoPersonal->first())
                            <p class="text-center">
                                Status: <strong>{{ ($getDataDepartamentoPersonal[0]->status != null) ? $getDataDepartamentoPersonal[0]->status : 'No Hay Información Disponible' }}</strong>
                            </p>
                            @else
                            <p class="text-center font-weight-bold">*Este candidato aun no está presente en este Departamento*</p>
                        @endif

                    </section>
                    

            </div>
        </section>
    </main>
@stop

@section('js')
    
@stop

@section('css')
    
@stop