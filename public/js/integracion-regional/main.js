(function(){
    $('#btn_preview_memorandum_file').on('click', function(e){
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
        $('#btn_eliminar_memorandum_file').on('click', function(e){
            e.preventDefault()
            if( document.querySelector('#memorandum_file').files[0] != undefined ){
                document.querySelector('#memorandum_file').value = ""
                $('#label_memorandum_file').html(`Memorandum <small class="text-primary mx-1">Máximo 128 MB</small>`);
            }else{
                alert("Por favor, primero adjunta el Documento Memorandum ");
            }
        });

        


        $('#btn_preview_cedula_siep_file').on('click', function(e){
                        e.preventDefault()
                        let $getMemorandum = document.querySelector('#cedula_siep_file').files[0];
                        if( $getMemorandum != undefined ){
                            let $createUrlBrowser = URL.createObjectURL( $getMemorandum );
                            $('#preview_file').modal('show');
                            $('#titleModalPreviewPDF').html( $getMemorandum.name );
                            $('#previewPDFframe').attr('src', $createUrlBrowser);
                        }else{
                            alert("Por favor, primero adjunta el Documento Memorandum ");
                        }
        });

        $('#btn_eliminar_cedula_siep_file').on('click', function(e){
            e.preventDefault()
            if( document.querySelector('#cedula_siep_file').files[0] != undefined ){
                document.querySelector('#cedula_siep_file').value = ""
                $('#label_cedula_siep_file').html(`Cedula SIEP <small class="text-primary mx-1">Máximo 128 MB</small>`);
            }else{
                alert("Por favor, primero adjunta el Documento Cédula SIEP ");
            }
        });



        

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
                $('#label_archivos_adicionales').html(`Archivos Adicionales <small class="text-primary mx-1">Máximo 768 MB</small>`);
            }else{
                alert("Por favor primero adjuntar los Archivos Adicionales");
            }
            });

})()