
<section class="container" title="Ver o Editar Información sobre el Status de Validación del Candidato">

    <div class="modal fade" tabindex="-1" id="modalForStatusWatchOrEdit{{ $idDataForDepartament }}"  aria-labelledby="modalForStatusWatchOrEdit" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleForStatus">Ver o Modificar Status</h5>
                <button type="button" class="close" data-dismiss="modal" id="closeModalForStatusIcon" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <main class="modal-body" id="modalBodyForStatus">
                
                <p class="text-center">
                    Modo: <strong class="text-primary" id="modeForStatus{{ $idDataForDepartament }}"></strong>
                </p>

                    <section class="container" id="WatchOrEdittForStatus" data-title="WatchOrEdittForStatus" data-element="ModalForStatusWithData">

                        {{-- Informacion cargada de la DATA de Busqueda --}}
                        <article class="row my-3" id="sectionWatchStatus" style="background-color: #E3F2FD;">
                            <div class="col-12 my-2">
                                <p class="text-center" id="posicion_data{{ $idDataForDepartament }}">
                                </p>
                            </div>
                            <div class="col-12 my-2">
                                <p class="text-center" id="ficha_data{{ $idDataForDepartament }}">
                                </p>
                            </div>
                            <div class="col-12 my-2">
                                <p class="text-center" id="nombre_data{{ $idDataForDepartament }}">
                                </p>
                            </div>
                            <div class="col-12 my-2">
                                <p class="text-center" id="regimen_contractual_data{{ $idDataForDepartament }}">
                                </p>
                            </div>
                        </article>
                        @csrf

                        {{-- Se inserta de forma dinámica, el valor registrado en la Tabla y tener la opcion de editarlo --}}
                        <article class="container my-3" data-element="sectionForStatus">
                            <div class="row" style="background-color: #E3F2FD;">
                                <div class="col-12 form-group" id="box_status">
                                    {{-- Campo --}}
                                    <label for='campo_status'>Status: </label>
                                <input type="text" class="form-control" id="campo_status{{ $idDataForDepartament }}" required maxLength="255" disabled value="No hay Informacion Definida">
                                </div>
                            </div>
                        </article>


                    </section>


            </main>
            <section class="modal-footer">
                <div id="sectionEditSaveChanges{{ $idDataForDepartament }}">
                    {{-- Boton de Editar --}}
                    <button type="button" class="btn btn-primary" id="btn_editar_modal_for_status{{ $idDataForDepartament }}" onclick="getIDForDepartamentConsult(
                        {{$idDataForDepartament}},
                        {{$ruta}},
                        {{$departamento}},
                    )">Editar</button>
                </div>
                {{-- Boton de Cerrar Ventana --}}
                <button type="button" class="btn btn-secondary" data-dismiss="modal"  id="closeModalForStatus">Cerrar Ventana</button>
            </section>
            </div>
        </div>
    </div>

    

</section>