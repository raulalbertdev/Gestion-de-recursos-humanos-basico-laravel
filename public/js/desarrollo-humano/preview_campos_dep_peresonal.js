(function(){
    /* ----------------------------------------------------------------------------------------------------------- */
     $('#preview_memorandum_file_oficial').on('click', function(e){
                        e.preventDefault()
                        let memorandum_document_oficial = document.querySelector('#memorandum_file_document').files[0];
                        if(  memorandum_document_oficial != undefined ){
                            let $createUrlBrowser = URL.createObjectURL(  memorandum_document_oficial );
                            $('#preview_file').modal('show');
                            $('#titleModalPreviewPDF').html( memorandum_document_oficial.name );
                            $('#previewPDFframe').attr('src', $createUrlBrowser);
                        }else{
                            alert("Por favor, primero adjunta el Documento Memorandum ");
                        }
        });

        $('#btn_eliminar_memorandum_file_oficial').on('click', function(e){
            e.preventDefault()
            if( document.querySelector('#memorandum_file_document').files[0] != undefined ){
                document.querySelector('#memorandum_file_document').value = ""
                $('#label_memorandum_file_document').html(`Memorandum <small class="mx-1 text-primary">Máximo 128 MB</small>`);
            }else{
                alert("Por favor, primero adjunta el Documento Memorandum ");
            }
        });
/* ----------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------- */
     $('#preview_cedula_siep_documento').on('click', function(e){
                        e.preventDefault()
                        let cedula_siep_oficial = document.querySelector('#cedula_siep_documento').files[0];
                        if(  cedula_siep_oficial != undefined ){
                            let $createUrlBrowser = URL.createObjectURL(  cedula_siep_oficial );
                            $('#preview_file').modal('show');
                            $('#titleModalPreviewPDF').html( cedula_siep_oficial.name );
                            $('#previewPDFframe').attr('src', $createUrlBrowser);
                        }else{
                            alert("Por favor, primero adjunta el Documento Cedula SIEP ");
                        }
        });

        $('#btn_eliminar_cedula_siep_documento').on('click', function(e){
            e.preventDefault()
            if( document.querySelector('#cedula_siep_documento').files[0] != undefined ){
                document.querySelector('#cedula_siep_documento').value = ""
                $('#label_cedula_siep_documento').html(`Cedula SIEP <small class="mx-1 text-primary">Máximo 128 MB</small>`);
            }else{
                alert("Por favor, primero adjunta el Documento Cedula SIEP ");
            }
        });
/* ----------------------------------------------------------------------------------------------------------- */


/* ----------------------------------------------------------------------------------------------------------- */

    $('#preview_archivos_adicionales_documentos').on('click', function(e){
                e.preventDefault();
                    let documentos_adicionales_oficiales = document.querySelector('#archivos_adicionales').files;
                    let url_files = generateUrls(documentos_adicionales_oficiales);
                    if(documentos_adicionales_oficiales.length > 0){
                        $('#preview_buttons_files_adicionales').modal('show');
                        $( '#rows_btn_preview_files_adicionales' ).html(
                            generateBtnPreviewFilesAdicionales(url_files , documentos_adicionales_oficiales )
                        );
                    }else{
                        alert("Por favor primero adjuntar los Archivos Adicionales");
                    }
            });
            $('#btn_eliminar_archivos_adicionales_documentos').on('click', function(e){
                 e.preventDefault()
            if( document.querySelector('#archivos_adicionales').files.length > 0 ){
                document.querySelector('#archivos_adicionales').value = ""
                $('#label_files_adicionales_oficial').html(`Subir Archivos Adicionales <small class="mx-1 text-primary">Máximo 512 MB en Total</small>`);
            }else{
                alert("Por favor primero adjuntar los Archivos Adicionales");
            }
            });
})()