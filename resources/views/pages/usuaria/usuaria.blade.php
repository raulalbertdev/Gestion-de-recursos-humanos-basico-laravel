@extends('adminlte::page')

@section('title', 'Area Usuaria')

@section('content_header')
    <h1 class="text-center font-weight-bold h1">Subir Documentos</h1>
@stop

@section('content')

    <section class="container">
        @if (session('status'))
            <div class="alert alert-success text-center font-weight-bold" style="font-size: 22px;">
                {{ session('status') }}
            </div>
        @endif
    </section>

    <section class="container-fluid bg-light py-5">
        <p class="font-weight-bold h2 text-center mt-4 mb-2">Registro de memorándum de contratación</p>
        <form action="{{ route('integracion-regional.store') }}" method="POST" enctype="multipart/form-data" class="mt-5 mb-3 py-3">
            @csrf
            
            <div class="row container p-3">

                <div class="col-12">
                    <div class="form-group">
                      <label for="posicion">Posicion <small class="text-primary">Necesario para rellenar de forma automática la Ficha y Nombre...</small></label>
                      <input type="text" class="form-control" id="posicion" name="posicion" placeholder="Escribe la posicion..." onkeyup="enabledInputFiles()" value="{{ old("posicion") }}">
                      {!!  $errors->first('posicion' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                      <label for="ficha">Ficha</label>
                      <input type="text" class="form-control" id="ficha" name="ficha" placeholder="Escribe la ficha..." onkeyup="enabledInputFiles()" value="{{ old("ficha") }}">
                      {!!  $errors->first('ficha' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe la nombre..." onkeyup="enabledInputFiles()" value="{{ old("nombre") }}">
                      {!!  $errors->first('nombre' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                      <label for="regimen_contractual">Regimen contractual</label>
                      <input type="text" class="form-control" id="regimen_contractual" name="regimen_contractual" placeholder="Escribe la regimen_contractual..." onkeyup="enabledInputFiles()" value="{{ old("regimen_contractual") }}">
                      {!!  $errors->first('regimen_contractual' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>

        <!-- Campos para adjuntar los documentos -->
                <div class="col-12 mt-4">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="memorandum_file" name="memorandum" lang="es" accept=".pdf"  disabled value="{{ old('memorandum') }}">
                      <label class="custom-file-label" for="memorandum_file" id="label_memorandum_file">Memorandum <small class="text-primary mx-1">Máximo 256 MB</small> </label>
                      {!!  $errors->first('memorandum' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                    <section class="d-flex justify-content-center mt-3">
                        <button class="btn btn-primary btn-md mx-2" id="PreviewMemorandum">Vista Previa</button>
                        <button class="btn btn-danger btn-md mx-2" id="EliminarMemorandum">Eliminar</button>
                    </section>
                </div>
                {{-- <div class="col-6">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="cedula_siep_file" name="cedula_siep" lang="es" accept=".pdf">
                      <label class="custom-file-label" for="cedula_siep_file">Cédula SIEP</label>
                    </div>
                </div> --}}
            </div>
            <div class="container-fluid my-2">
                <p class="text-center font-weight-bold my-2"><i class="fa fa-exclamation-triangle mx-1" aria-hidden="true"></i>Favor de Solo subir 7 archivos como máximo</p>
                <div class="row py-3 px-2">
                    <div class="col-12 custom-file">
                        <input type="file" class="custom-file-input" id="files_especiales" name="files_especials[]" lang="es" accept=".pdf" multiple disabled value="{{ old('files_especials') }}">
                        <label class="custom-file-label" for="files_especiales" id="label_files_adicionales">Subir Archivos Adicionales <small class="text-primary mx-1">Máximo 768 MB en total</small></label>
                        {!!  $errors->first('files_especials' , '<small class="text-danger font-weight-bold">:message</small>') !!}
                    </div>
                </div>
                <section class="d-flex justify-content-center mt-3">
                    <button class="btn btn-primary btn-md mx-2" id="btn_preview_files_adicionales">Vista Previa</button>
                    <button class="btn btn-danger btn-md mx-2" id="btn_eliminar_files_adicionales">Eliminar</button>
                </section>
                
            </div>

            <section class="container py-3 mt-3">
                <input type="submit" class="btn btn-success btn-block d-block mx-auto" value="Registrar y Guardar Documentos">
            </section>
        </form>
    </section>

    {{-- Modal --}}
    <!-- Button trigger modal -->

<!-- Modal para Visualizar el PDF-->
<div class="modal fade " id="preview_file" aria-labelledby="preview_file" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bg-light" id="titleModalPreviewPDF"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <iframe id="previewPDFframe" width="100%" height="500px" frameborder="0"></iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

{{-- Visualizar varios Botones para Visualizar cada multiple PDF  --}}
<div class="modal fade " id="preview_buttons_files_adicionales" aria-labelledby="preview_buttons_files_adicionales" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bg-light" id="titleModalPreviewPDF"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="rows_btn_preview_files_adicionales">
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
    <script>
        $(document).ready(function () {
        bsCustomFileInput.init()
        })

        /* Logica para la vista previa y eliminacion del memorandum */
        $('#PreviewMemorandum').on('click', function(e){
                        e.preventDefault()
                        let $getMemorandum = document.querySelector('#memorandum_file').files[0];
                        if( $getMemorandum != undefined ){
                            let $createUrlBrowser = URL.createObjectURL( $getMemorandum );
                            $('#preview_file').modal('show');
                            $('#titleModalPreviewPDF').html( $getMemorandum.name );
                            $('#previewPDFframe').attr('src', $createUrlBrowser);
                        }else{
                            alert("Por favor, primero adjunta el Documento Memorandum ");
                        }
        });
        $('#EliminarMemorandum').on('click', function(e){
            e.preventDefault()
            if( document.querySelector('#memorandum_file').files[0] != undefined ){
                document.querySelector('#memorandum_file').value = ""
                $('#label_memorandum_file').html(`Memorandum <small class="text-primary mx-1">Máximo 256 MB</small>`);
            }else{
                alert("Por favor, primero adjunta el Documento Memorandum ");
            }
        });
            /* ------------------------------------------------------ */

            /*  Logica para la vista previa y eliminacion de archivos adicionales */
            
        

            $('#btn_preview_files_adicionales').on('click', function(e){
                e.preventDefault();
                    let documentos_adicionales = document.querySelector('#files_especiales').files;
                    let url_files = generateUrls(documentos_adicionales);
                    if(documentos_adicionales.length > 0){
                        $('#preview_buttons_files_adicionales').modal('show');
                        $( '#rows_btn_preview_files_adicionales' ).html(
                            generateBtnPreviewFilesAdicionales(url_files , documentos_adicionales )
                        );
                    }else{
                        alert("Por favor primero adjuntar los Archivos Adicionales");
                    }
            });
            $('#btn_eliminar_files_adicionales').on('click', function(e){
                 e.preventDefault()
            if( document.querySelector('#files_especiales').files.length > 0 ){
                document.querySelector('#files_especiales').value = ""
                $('#label_files_adicionales').html(`Archivos Adicionales <small class="text-primary mx-1">Máximo 768 MB</small>`);
            }else{
                alert("Por favor primero adjuntar los Archivos Adicionales");
            }
            });
            /* --------------------------------------------------------------------------- */

        function enabledInputFiles(){
        const inputName = $('#nombre').val(), inputPosicion = $('#posicion').val(), inputFicha = $('ficha').val(), inputRegimenContractual = $('#regimen_contractual').val();
                if( inputName != '' && inputPosicion != '' && inputFicha != '' && inputRegimenContractual != '' ){
                    $('#memorandum_file').removeAttr('disabled');
                    $('#files_especiales').removeAttr('disabled');
                }
                if( inputName == '' || inputPosicion == '' || inputFicha == '' || inputRegimenContractual == '' ){
                    $('#memorandum_file').attr('disabled','disabled');
                    $('#files_especiales').attr('disabled','disabled');
                }
        }

        $('#posicion').on('keyup', function(){
            $.ajax({
            url : '/get-trabajador',
            method: 'POST',
            data: {
              posicion : $(this).val(),
              concepto : 'posicion',
              _token : $('input[name="_token"]').val()
            }
          }).done(function(response){
            JSON.parse(response).forEach(element => {
              $('#ficha').val(element.ficha);
              $('#nombre').val(element.nombre);
              /* $('#regimen_contractual').val(element.regimen_contractual); */
            });
          })
        });

    </script>
@stop