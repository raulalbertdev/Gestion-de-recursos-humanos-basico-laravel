@extends('adminlte::page')

@section('title', 'Ver Fechas')

@section('content_header')
    <h1>Tiempos de Contratación </h1>
@stop
@section('content')
<div class="container d-flex justify-content-end">
    <a class="btn btn-success btn-md" href="{{route('proceso-fechas.index')}}">Regresar</a>
</div>
    <section class="container border border-dark">
        <section class="container bg-light">
            <article>
                <p class="h2 text-center">Informacion:</p>
                <p class="text-center"><strong>Posicion:</strong> {{ $dataSearhFechas[0]->posicion }}</p>
                <p class="text-center"><strong>Ficha:</strong> {{ $dataSearhFechas[0]->ficha }}</p>
                <p class="text-center"><strong>Nombre:</strong> {{ $dataSearhFechas[0]->nombre }}</p>
                <p class="text-center"><strong>Regimen Contractual:</strong> {{ $dataSearhFechas[0]->regimen_contractual }}</p>
            </article>
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Salida de Area Usuaria:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_integracionRegional->created_at) ? $proceso_integracionRegional->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Entrada en el Departamento de Integracion Regional:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_integracionRegional->created_at) ? $proceso_integracionRegional->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>
                
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Salida en el Departamento de Integracion Regional:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_desarrolloHumano[0]->created_at) ? $proceso_desarrolloHumano[0]->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            
            </div>
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Entrada en el Departamento de Desarrollo Humano:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_desarrolloHumano[0]->created_at) ? $proceso_desarrolloHumano[0]->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>

             <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Salida en el Departamento de Desarrollo Humano:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_departamentoPersonal[0]->created_at) ? $proceso_departamentoPersonal[0]->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            
            </div>
            <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Entrada en el Departamento Personal:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_departamentoPersonal[0]->created_at) ? $proceso_departamentoPersonal[0]->created_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>

             <div class="form-group">
                <label for="fecha_salida_area_usuaria">Fecha de Contratación:</label>
                <input type="text" class="form-control" id="fecha_salida_area_usuaria" value="{{isset($proceso_departamentoPersonal[0]->updated_at) ? $proceso_departamentoPersonal[0]->updated_at->format('d - m - Y      h:i:s') : 'No hay Información Disponible'}}">
            </div>

        </section>
    </section>
@stop


{{-- @section('js')
@stop --}}