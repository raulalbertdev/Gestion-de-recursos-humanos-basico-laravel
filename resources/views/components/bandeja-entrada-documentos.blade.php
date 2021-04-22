{{-- Recibir Datos --}}
{{-- 
    $ id del candidato
    $ Nombre del departamento para saber que archivo descargar
    $ Indicar si es memorandum, cedula_siep 
    $texto o titulo para colocarlo al boton de la descarga de archivos
    
    $Modelo  en el cual contiene todos los registros traido de la base de datos, en excepcion con los campos de archivos adicionales
    $Modelo en el cual contiene los registros traido de la base de datos de los campos de archivos adicionales
    
    $un valor true para saber si mandaron archivos adicionales
    --}}
    
        {{-- Bandeja de Entrada --}}
<section class="container" title="Descarga de Documentos">
            <div class="card">
                    <div class="card-header bg-light text-center text-muted">
                            Descargar Archivos
                    </div>
                    <div class="card-body">
                        <p class="card-text text-center h3 font-weight-bold">{{$titleBandeja}}</p>
                        <button class="btn btn-primary d-block mx-auto" type="button" data-toggle="collapse" data-target="#SectiondownloadFiles" aria-expanded="true" aria-controls="SectiondownloadFiles">
                            <i class="fa fa-angle-double-down" style="font-size: 25px;" aria-hidden="true"></i>
                        </button>
                    </div>
                    <section class="container collapse" id="SectiondownloadFiles">
                        {{-- inicio de la  bandeja de entrada --}}
                        <div class="accordion" id="{{ $accordionID }}">
                        {{ $slot }}
                        </div>
                        {{-- fin de la  bandeja de entrada --}}
                    </section>
                    <div class="card-footer text-muted text-center">
                        {{$diferenciaFecha}}
                    </div>
            </div>
</section>