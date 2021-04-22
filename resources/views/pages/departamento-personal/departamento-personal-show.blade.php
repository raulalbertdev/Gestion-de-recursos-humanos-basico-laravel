@extends('adminlte::page')

@section('title', 'Validacion y Contratacion')

@section('content_header')
    <h1>Departamento Personal</h1>
@stop

@section('content')
    <x-bandeja-entrada-documentos :diff-fecha="$userDepartamentoPersonal->created_at->diffForHumans()" data-parent-component="downloadFiles">
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_carta_no_inhabilitacion_download" card-header="headerCartaNoInhabilitacion" documento="Memorandum"{{-- departamento="Area Usuaria" --}}>
        <a href="{{ route('download',['id' =>$userDepartamentoPersonal->id , 'departamento' => 'departamento_personal', 'file' => 'memorandum_documento'] ) }}" class="btn btn-success btn-block">Descargar Memorandum</a>
      </x-item-card-document>
      {{-- ------- --}}
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_cedulasiep_download" card-header="headerCedulaSIEP" documento="Cedula SIEP"{{-- departamento="Area Usuaria" --}}>
        <a href="{{ route('download',['id' =>$userDepartamentoPersonal->id , 'departamento' => 'departamento_personal', 'file' => 'cedula_siep_documento'] ) }}" class="btn btn-success btn-block">Descargar Cedula SIEP</a>
      </x-item-card-document>
      {{--  --}}
      <x-item-card-document parent-component="downloadFiles" name-collapse="section_files_adicionales" card-header="headerFilesAdicionales" documento="Archivos Adicionales">
         @foreach (json_decode($archivos_adicionales[0]) as $key => $item)
                    @if ($item)
                       <a href="{{ route('download',['id' =>$userDepartamentoPersonal->id , 'departamento' => 'departamento_personal', 'file' => $key]) }}" class="btn btn-success py-2 my-3 btn-block">Descargar Archivo Adicional "{{ $key }}"</a> 
                    @endif
            @endforeach
      </x-item-card-document>

</x-bandeja-entrada-documentos>



  <div class="container my-5" title="Seccion para el Informe del Status del Trabajador">
    <button class="btn btn-block" style="background-color: #29B6F6;" id="btnWatchStatus" data-element="WatchStatus" data-id-search="{{ $dataSearchResult[0]->id }}" data-id-departament="{{ $dataSearchResult[0]->id_desarrollo_humano }}" onclick="executeActivitiesDinamicForStatus(
                            {{$dataSearchResult[0]->id_desarrollo_humano}},
                            '/get-data-departamento',
                            'Departamento Personal',
                            {{ $dataSearchResult[0]->id }},
                            '/get-data-search',
                            'modalForStatusWatchOrEdit'
                        )">Ver Status...</button>

                        <x-modal-for-status :idDataDepartament="$dataSearchResult[0]->id_desarrollo_humano" routeRedirect="'/post-data-status'" departamento="'Departamento Personal'"></x-modal-for-status>
  </div>


<section class="container">
  <article class="row">
    <div class="col-6 text-center font-weight-bold bg-dark text-white py-2">
      Nombre
    </div>
    <div class="col-6 text-center font-weight-bold bg-dark text-white py-2">
      Ficha
    </div>
  </article>
  <article class="row">
    <div class="col-6 text-center font-weight-bold py-2">
      {{$userDepartamentoPersonal->nombre}}
    </div>
    <div class="col-6 text-center font-weight-bold py-2">
      {{$userDepartamentoPersonal->ficha}}
    </div>
  </article>
</section>
<div class="container">
  <form action="{{ route('contratados.store') }}" method="POST">
    @csrf
    <div class="container form-group my-4">
      <input type="hidden" name="id_integracion" value="{{$userDepartamentoPersonal->id_integracion}}">

         <div class="form-group">
                              <label for="campo_fecha_desbloqueo_plaza">Fecha de desbloqueo de Plaza: </label>
                                  <input type="text" class="form-control" id="campo_fecha_desbloqueo_plaza" name="fecha_desbloqueo_plaza" placeholder="Seleccione una fecha..." value="{{ old('fecha_desbloqueo_plaza') }}">
                                  {!!  $errors->first('fecha_desbloqueo_plaza' , '<small class="text-danger font-weight-bold">:message</small>') !!}
        </div>

      <button type="submit" class="btn btn-success btn-block">Realizar Contratacion</button>
    </div>
  </form>
</div>
<hr>
<section class="container bg-light mb-4" title="Descargar Documentos de Desarrollo Humano">
  <p class="text-center h2 my-4">Descargar Documentos de Desarrollo Humano</p>
  <article class="row">
    @foreach (json_decode($archivos_adicionales_desarrollo_humana[0]) as $key => $item)
          @if ($item)
              <a class="btn btn-success btn-block my-2" href="{{ route('download',['id' =>$userDepartamentoPersonal->id , 'departamento' => 'departamento_personal', 'file' => $key]) }}">Descargar {{$key}}</a>
          @endif
        @endforeach

  </article>
</section>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
<script src="{{ asset('lib/js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/forStatus/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
      $(document).ready(function () {
          bsCustomFileInput.init()
      })
  
  $('#campo_fecha_desbloqueo_plaza').datepicker({
    dateFormat: "dd/mm/yy",
    numerOfMonths : 1,
    changeYear: true,
    changeMonth: true,
    showWeek: true,
    weekHeader : "wk no",
    showOtherMonths: true,
  });

    </script>
    
@stop


@section('css')
<link rel="stylesheet" href="{{ asset('lib/css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('lib/css/jquery-ui.structure.min.css') }}">
<link rel="stylesheet" href="{{ asset('lib/css/jquery-ui.theme.min.css') }}">
@stop