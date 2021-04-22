{{-- El Nombre del departamento me sirve para saber quien lo rechazo
    Los Controles de Opciones tipo checkbox, son para generarlos de forma dinamica
    Recibo 3 cosas para el checkbox:
    - Texto
    -Name
    -value

    El modelo de la tabla, me sirve para poder obtener el id del postulado en cierto departamento
    y asi poder enviarlo como referencia importante a la hora de hacer el proceso
    --}}
<section class="container-fluid bg-light py-4">
            
            <section class="container my-2 bg-primary">
              <p class="text-center font-weight-bold h2">Motivo de Rechazo</p>
            </section>

    <article class="col-12">
        <form action="{{ route('rechazados.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <input type="hidden" name="id_postulado" value="{{ $informacion }}">
            {{-- Mandamos informacion extra como hasta el nombre del departamento --}}
            <input type="hidden" name="departamento" value="{{ $departamento }}">
            @foreach ($controls as $item)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="{{ $item['Name'] }}" value="{{ $item['Razon'] }}" id="{{ $item['Name'] }}">
                    <label class="form-check-label" for="{{ $item['Name'] }}">
                        {{ $item['Texto'] }}
                    </label>
                </div>
            @endforeach
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="motivos_check" id="other_motivos">
                    <label class="form-check-label" for="other_motivos">
                        Por Otros Motivos
                    </label>
                </div>
                <div class="form-group" title="Escribe por otros motivos">
                    <input type="text" id="box_otros_motivos" name="otros_motivos" placeholder="Motivo ..." class="form-control" disabled>
                </div>
                @if ($departamento == 'Desarrollo Humano')
                    <section class="container my-3">
                            <div class="row">
                                <div class="col-12 form-group"> 
                                    <p class="text-center font-weight-bold mt-3">Adjuntar Notificacion No Procedencia</p>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="notificacion_no_procedencia" name="notificacion_no_procedencia_document" lang="es" accept=".pdf" value="{{ old('notificacion_no_procedencia') }}">
                                            <label class="custom-file-label" for="notificacion_no_procedencia_document" id="label_notificacion_no_procedencia_file">Notificación a la No Procedencia <small class="text-primary mx-1">Máximo 128 MB</small> </label>
                                            {!!  $errors->first('notificacion_no_procedencia' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                                        </div>
                                        <section class="d-flex justify-content-center mt-3">
                                            <button class="btn btn-primary btn-md mx-2" id="btn_preview_notificacion_no_procedencia_file">Vista Previa</button>
                                            <button class="btn btn-danger btn-md mx-2" id="btn_eliminar_notificacion_no_procedencia_file">Eliminar</button>
                                        </section>
                                </div>
                            </div>
                        </section>
                @endif
                        
                

            <section class="w-75 d-block mx-auto py-5 d-flex justify-content-center">
                <input type="submit"  value="No Procedio" class="btn btn-danger text-white font-weight-bold btn-block">
            </section>
        </form>
    </article>
</section>

    


    <script type="text/javascript">
    /* Buscamos el checkbox que habilitada la opcion "por otros motivos" y asi tambien habilitar el campo de texto para poder escribir sobre él */
    const checkBox = document.getElementById('other_motivos'), boxOtherMotivos = document.getElementById('box_otros_motivos');
    
    /* Cada vez que sea seleccionado o lo contrario, se habilitara o deshabilitará el campo de texto para especificar el motivo */
        checkBox.addEventListener('change', function(){
            (checkBox.checked) ? boxOtherMotivos.removeAttribute('disabled') : boxOtherMotivos.setAttribute('disabled','disabled');
            (!checkBox.checked) ? boxOtherMotivos.value='' : null
        });

        

    </script>
