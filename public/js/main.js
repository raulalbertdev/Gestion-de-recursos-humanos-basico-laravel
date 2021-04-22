function preview_document_files_adicionales(idModalPreviewPDF, idModalPreviewButtons ,urlPdf, nameDocument){
                $(idModalPreviewButtons).modal('hide');            
                $(idModalPreviewPDF).modal('show');
                $('#previewPDFframe').removeAttr('src');
                $('#titleModalPreviewPDF').html( nameDocument );
                $('#previewPDFframe').attr('src', urlPdf);
                urlPdf = null
            }

            
function generateUrls(documentsAdicionales){
    let new_url_files = []
                for( let i = 0; i < documentsAdicionales.length; i++ ){
                    new_url_files[i] = URL.createObjectURL( documentsAdicionales[i] );
                }
                return new_url_files;
}


function generateBtnPreviewFilesAdicionales(Urls, documentsPDF){
    let preview_buttons = /* html */``;
                            for( let i = 0; i < documentsPDF.length; i++ ){
                                preview_buttons += /* html */`
                                <div class='row my-2'>
                                    <div class='col-12 d-flex justify-content-center'>
                                        <button class="btn btn-primary btn-md px-5" onclick="preview_document_files_adicionales( 
                                            '#preview_file',
                                             '#preview_buttons_files_adicionales', 
                                             '${Urls[i]}' , 
                                             '${documentsPDF[i].name}'
                                             )">Visualizar "${documentsPDF[i].name }"</button>
                                    </div>
                                </div>
                                `

                            }

    return preview_buttons;
}