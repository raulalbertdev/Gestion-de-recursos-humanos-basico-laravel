function consultar_data_departamento( _id ,  ruta, departamento ){

        $.ajax({
            url : ruta,
            dataType: "json",
            method: 'POST',
            data: {
              id : _id,
              departamento : departamento,
              _token : $('input[name="_token"]').val()
            }
          }).done(function(response){

               if(response.dataResultSearchDepartament.status == null){
                  $('#box_status').html(
                  /* html */`<label for='campo_status'>Status: </label>
                  <input type="text" class="form-control" id="campo_status" required maxLength="255" disabled value="No hay Informacion Definida">`
              );
              }else{
                     $('#box_status').html(
                  /* html */`<label for='campo_status'>Status: </label>
                  <input type="text" class="form-control" id="campo_status" value="${ response.dataResultSearchDepartament.status }" required max="255" disabled>`
              );
              }

              

          })
}


function consultarDataSearch(_id_dataSearch, ruta){
        $.ajax({
            url : ruta,
            dataType: "json",
            method: 'POST',
            data: {
              id : _id_dataSearch,
              _token : $('input[name="_token"]').val()
            }
          }).done(function(response){
              $('#posicion_data').html(
                  /* html */`
                  <p class="text-center">Posicion: <strong>${ response.dataSearch.posicion } </strong> </p>`
              );
              $('#ficha_data').html(
                  /* html */`
                  <p class="text-center">Ficha: <strong>${ response.dataSearch.ficha } </strong> </p>`
              );
              $('#nombre_data').html(
                  /* html */`
                  <p class="text-center">Nombre: <strong>${ response.dataSearch.nombre } </strong> </p>`
              );
              $('#regimen_contractual_data').html(
                  /* html */`
                  <p class="text-center">Regimen_contractual: <strong>${ response.dataSearch.regimen_contractual } </strong> </p>`
              )

          })
}

function executeActivitiesDinamicForStatus( _id , rutaDepartament , departamento , _id_dataSearch , rutaDataSearch, IDModal ){

    $('#' + IDModal).modal('show');
    $('#modeForStatus').html('Visualización');
    consultar_data_departamento(
        _id,
        rutaDepartament,
        departamento
    );
    consultarDataSearch(
        _id_dataSearch,
        rutaDataSearch
    );

}

function executeActivitieUpdateForStatus( _id_for_departament , ruta , departamento, IDModal){

    $('#' + IDModal).modal('hide');
    $.ajax({
        url : ruta,
        method: 'POST',
        dataType : 'json',
        data:{
            id : _id_for_departament,
            campo_status : $('#campo_status').val(),
            departamento : departamento,
            _token : $('input[name="_token"]').val()
        }
    })/* fin del ajax */.done(function(response){
        alert( response.respuesta );
        location.reload();
    })

}

function ActivateInputsForEdit(/* campos a deshabilitar */ elements , dataIDUpdate, ruta , departamento){
    $('#btn_editar_modal_for_status').remove();
    $('#sectionEditSaveChanges').html(
        /* html */`<button type="button" class="btn btn-success" id="btn_save_changes_modal_for_status" onclick="executeActivitieUpdateForStatus('${dataIDUpdate}', '${ruta}' , '${departamento}' ) , '#modalForStatusWatchOrEdit' ">Guardar Cambios</button>`
    );
    $('#modeForStatus').html('Edición');
    elements.forEach(item => {
        $( item ).removeAttr('disabled');
    });
}

function getIDForDepartamentConsult(_id_data_departament, ruta, departamento){
    ActivateInputsForEdit([
        '#campo_status',
    ] , _id_data_departament , ruta , departamento);
}

document.getElementById('closeModalForStatus').addEventListener('click',function(){
    location.reload()
});

document.getElementById('closeModalForStatusIcon').addEventListener('click',function(){
    location.reload()
});


