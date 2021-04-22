<section title="Buscador en Tiempo Real" class="container mt-4 mb-3">
    <form action="{{ route('resultados-search') }}" method="GET" class="d-flex justify-content-end">
        {{-- No necesita de @csrf --}}
        <div class="form-group" style="width: 45%;">
           <section class="row">
              
            <div class="col-12 d-flex justify-content-center align-items-center">
                 <label for="search" class="mx-2">Buscar: </label>
                <input class="form-control" type="text" name="text" id="search">
                <input type="submit" value="Enviar" class="btn btn-success"> 
            </div>
            <div class="col-12 mt-3">
                    <div class="form-group">
                        <article class="row">
                            <div class="col-3"><label for="validationNameSearch">Buscar por: </label></div>
                            <div class="col-9">
                                <select name="text_search" id="validationNameSearch" class="form-control">
                                    @foreach ($campos as $item)
                                        <option value="{{$item['value']}}">{{$item['text']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </article>
                    </div>
                     <div class="col-12">
                         {{-- El Request no acepta valores de <input> deshabiltiado --}}
                   <input type="hidden" class="form-control" name="route_consulta" value="{{ $routeShow }}"  id="route_consulta">
                   <input type="hidden" class="form-control" name="modelo" value="{{ $modelo }}"  id="modelo">
               </div>
            </div>
           </section>
        </div>
    </form>
</section>


{{-- 
    <x-search-component modelo="Postulate" route-redirect="postulados.show" :campos="array(
                [
                    'text'=>'Nombre',
                    'value'=>'nombre'
                ],
                [
                    'text'=>'Ficha',
                    'value'=>'ficha'
                ],
                [
                    'text'=>'Plaza',
                    'value'=>'plaza'
                ],
                [
                    'text'=>'Numero de Expediente',
                    'value'=>'numero_expediente'
                ]
            )"></x-search-component>
    
    
    
    --}}