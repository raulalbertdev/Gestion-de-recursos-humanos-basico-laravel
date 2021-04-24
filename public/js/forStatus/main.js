function consultar_data_departamento( _id,  ruta, departamento ){

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
                $('#campo_status' + _id ).val('No hay Informacion Disponible');
              }else{
                $('#campo_status' + _id ).val(response.dataResultSearchDepartament.status);
            }

        })
}


function consultarDataSearch(_id_dataSearch, _id_departamento,  ruta){
        $.ajax({
            url : ruta,
            dataType: "json",
            method: 'POST',
            data: {
              id : _id_dataSearch,
              _token : $('input[name="_token"]').val()
            }
          }).done(function(response){
              $('#posicion_data' + _id_departamento).html(
                  /* html */`
                  <p class="text-center">Posicion: <strong>${ response.dataSearch.posicion } </strong> </p>`
              );
              $('#ficha_data' + _id_departamento).html(
                  /* html */`
                  <p class="text-center">Ficha: <strong>${ response.dataSearch.ficha } </strong> </p>`
              );
              $('#nombre_data' + _id_departamento).html(
                  /* html */`
                  <p class="text-center">Nombre: <strong>${ response.dataSearch.nombre } </strong> </p>`
              );
              $('#regimen_contractual_data' + _id_departamento).html(
                  /* html */`
                  <p class="text-center">Regimen_contractual: <strong>${ response.dataSearch.regimen_contractual } </strong> </p>`
              )

          })
}

function executeActivitiesDinamicForStatus( _id , rutaDepartament , departamento , _id_dataSearch , rutaDataSearch, IDModal ){

    $('#' + IDModal).modal('show');
    $('#modeForStatus' + _id).html('Visualización');
    consultar_data_departamento(
        _id,
        rutaDepartament,
        departamento
    );
    consultarDataSearch(
        _id_dataSearch,
        _id,/* id del departamento */
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
            campo_status : $('#campo_status' + _id_for_departament).val(),
            departamento : departamento,
            _token : $('input[name="_token"]').val()
        }
    })/* fin del ajax */.done(function(response){
        alert( response.respuesta );
        location.reload();
    })

}

function ActivateInputsForEdit(/* campos a deshabilitar */ elements , dataIDUpdate, ruta , departamento){
    $('#btn_editar_modal_for_status' + dataIDUpdate).remove();
    $('#sectionEditSaveChanges' + dataIDUpdate).html(
        /* html */`<button type="button" class="btn btn-success" id="btn_save_changes_modal_for_status${dataIDUpdate}" onclick="executeActivitieUpdateForStatus('${dataIDUpdate}', '${ruta}' , '${departamento}' ) , '#modalForStatusWatchOrEdit${dataIDUpdate}' ">Guardar Cambios</button>`
    );
    $('#modeForStatus'+ dataIDUpdate).html('Edición');
    elements.forEach(item => {
        $( item ).removeAttr('disabled');
    });
}

function getIDForDepartamentConsult(_id_data_departament, ruta, departamento){
    ActivateInputsForEdit([
        '#campo_status' + _id_data_departament,
    ] , _id_data_departament , ruta , departamento);
}

document.getElementById('closeModalForStatus').addEventListener('click',function(){
    location.reload()
});

document.getElementById('closeModalForStatusIcon').addEventListener('click',function(){
    location.reload()
});
