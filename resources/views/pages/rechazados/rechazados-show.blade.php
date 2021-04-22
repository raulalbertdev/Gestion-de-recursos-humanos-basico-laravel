@extends('adminlte::page')

@section('title', 'Rechazados')

@section('content_header')
    <h1>Contratación No Procedencia - Información</h1>
@stop

@section('content')
    <section class="container my-2">
    </section>
    <section class="container">
            <x-bandeja-entrada-documentos :diff-fecha="$userRechazado->created_at->diffForHumans()" data-parent-component="downloadFileNotificacionNoProcedente">
                        <x-item-card-document parent-component="downloadFileNotificacionNoProcedente" name-collapse="section_url_notificacion_no_procedencia_download" card-header="headerNotificacionNoProcedente" documento="Notificacion No Procedencia"{{-- departamento="Rechazados" --}}>
        
                            @if ($userRechazado->url_notificacion_no_procedencia != null || $userRechazado->url_notificacion_no_procedencia != "")
                                <a href="{{ route('download',['id' =>$userRechazado->id , 'departamento' => 'rechazados', 'file' => 'url_notificacion_no_procedencia'] ) }}" class="btn btn-success btn-block">Descargar Notificacion No Procedencia</a>
                            @else
                                <p class="text-center font-weight-bold h3">No Hay Archivo Por Descargar</p>
                            @endif
        
        
                        </x-item-card-document>
            </x-bandeja-entrada-documentos>
        
        
    </section>
    <section class="container-fluid bg-light py-5">
        <section class="row">

            <div class="col-12 my-3">
                <p class="text-center" style="font-size: 19px;"> <strong>Departamento en el que no Aplico Contratacion: </strong>  {{ $userRechazado->departamento }}</p>
            </div>

             <div class="col-12 my-3">
                <p class="text-center" style="font-size: 19px;"> <strong>Observaciones: </strong>  {{ $userRechazado->observaciones }}</p>
            </div>
            


        </section>
        
        <form action="{{ route('rechazados.destroy' , $userRechazado->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <section class="container my-3" data-title="Eliminar Candidato de Contratacion No Aplicada">
                    <p class="text-center h3 font-weight-bold my-2">Eliminar Candidato de Contratacion No Aplicada</p>
                    <div class="w-75 d-block mx-auto">
                        <input type="submit" class="btn btn-danger btn-block" value="Eliminar Usuario">
                    </div>
             </section>
          </form>

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