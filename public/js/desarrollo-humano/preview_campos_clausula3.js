(function(){
    
/* ----------------------------------------------------------------------------------------------------------- */
     $('#preview_carta_no_inhabilitacion').on('click', function(e){
                        e.preventDefault()
                        let carta_no_inhabiltiacion = document.querySelector('#carta_no_inhabilitacion_document').files[0];
                        if(  carta_no_inhabiltiacion != undefined ){
                            let $createUrlBrowser = URL.createObjectURL(  carta_no_inhabiltiacion );
                            $('#preview_file').modal('show');
                            $('#titleModalPreviewPDF').html( carta_no_inhabiltiacion.name );
                            $('#previewPDFframe').attr('src', $createUrlBrowser);
                        }else{
                            alert("Por favor, primero adjunta el Documento Carta de No Inhabilitacion ");
                        }
        });

        $('#btn_eliminar_carta_no_inhabilitacion').on('click', function(e){
            e.preventDefault()
            if( document.querySelector('#carta_no_inhabilitacion_document').files[0] != undefined ){
                document.querySelector('#carta_no_inhabilitacion_document').value = ""
                $('#label_carta_no_inhabilitacion').html(`Carta de no inhabilitación <small class="text-primary mx-1">Máximo 64 MB</small>`);
            }else{
                alert("Por favor, primero adjunta el Documento Carta de no inhabilitación ");
            }
        });
/* ----------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------- */
     $('#btn_preview_cedula_siep_file').on('click', function(e){
                        e.preventDefault()
                        let cedula_siep = document.querySelector('#cedula_siep_file').files[0];
                        if( cedula_siep != undefined ){
                            let $createUrlBrowser = URL.createObjectURL( cedula_siep );
                            $('#preview_file').modal('show');
                            $('#titleModalPreviewPDF').html( cedula_siep.name );
                            $('#previewPDFframe').attr('src', $createUrlBrowser);
                        }else{
                            alert("Por favor, primero adjunta el Documento Cedula SIEP ");
                        }
        });

        $('#btn_eliminar_cedula_siep_file').on('click', function(e){
            e.preventDefault()
            if( document.querySelector('#cedula_siep_file').files[0] != undefined ){
                document.querySelector('#cedula_siep_file').value = ""
                $('#label_cedula_siep_file').html(`Cédula SIEP Firmado <small class="text-primary mx-1">Máximo 64 MB</small>`);
            }else{
                alert("Por favor, primero adjunta el Documento Cedula SIEP ");
            }
        });
/* ----------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------- */
     $('#preview_validacion_siep_file').on('click', function(e){
                        e.preventDefault()
                        let validacion_siep = document.querySelector('#validacion_siep_file').files[0];
                        if( validacion_siep != undefined ){
                            let $createUrlBrowser = URL.createObjectURL( validacion_siep );
                            $('#preview_file').modal('show');
                            $('#titleModalPreviewPDF').html( validacion_siep.name );
                            $('#previewPDFframe').attr('src', $createUrlBrowser);
                        }else{
                            alert("Por favor, primero adjunta el Documento Validacion SIEP ");
                        }
        });

        $('#btn_eliminar_validacion_siep_file').on('click', function(e){
            e.preventDefault()
            if( document.querySelector('#validacion_siep_file').files[0] != undefined ){
                document.querySelector('#validacion_siep_file').value = ""
                $('#label_validacion_siep_file').html(`Validacion SIEP <small class="text-primary mx-1">Máximo 64 MB</small>`);
            }else{
                alert("Por favor, primero adjunta el Documento Validacion SIEP ");
            }
        });
/* ----------------------------------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------------------------------- */
     $('#preview_resultados_ev_tec').on('click', function(e){
                        e.preventDefault()
                        let resultados_tecnicos = document.querySelector('#resultados_tec').files[0];
                        if( resultados_tecnicos != undefined ){
                            let $createUrlBrowser = URL.createObjectURL( resultados_tecnicos );
                            $('#preview_file').modal('show');
                            $('#titleModalPreviewPDF').html( resultados_tecnicos.name );
                            $('#previewPDFframe').attr('src', $createUrlBrowser);
                        }else{
                            alert("Por favor, primero adjunta el Documento Resultados Tecnicos ");
                        }
        });

        $('#btn_eliminar_resultados_ev_tec').on('click', function(e){
            e.preventDefault()
            if( document.querySelector('#resultados_tec').files[0] != undefined ){
                document.querySelector('#resultados_tec').value = ""
                $('#label_resultados_ev_tec').html(`Resultados ev. Tec. <small class="text-primary mx-1">Máximo 64 MB</small>`);
            }else{
                alert("Por favor, primero adjunta el Documento Resultados Tecnicos ");
            }
        });
/* ----------------------------------------------------------------------------------------------------------- */

    $('#preview_files_especiales').on('click', function(e){
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
            $('#btn_eliminar_files_especiales').on('click', function(e){
                 e.preventDefault()
            if( document.querySelector('#files_especiales').files.length > 0 ){
                document.querySelector('#files_especiales').value = ""
                $('#label_files_adicionales_clausula').html(`Subir Archivos de Clausula 3 <small class="mx-1 text-primary">Máximo 128 MB en Total</small>`);
            }else{
                alert("Por favor primero adjuntar los Archivos Adicionales");
            }
            });
})()