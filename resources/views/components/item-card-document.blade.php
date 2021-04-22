<section class="card">
    <article class="card-header bg-light" id="{{$cardHeader}}">
        <div class="mb-0">
            <button class="btn btn-link btn-block text-center font-weight-bold collapsed" type="button" data-toggle="collapse" data-target="#{{$collapseID}}" aria-expanded="true" aria-controls="{{$collapseID}}">
              {{$documento}}
            </button>
          </div>
    </article>
    <section id="{{$collapseID}}" class="collapse" aria-labelledby="{{$cardHeader}}" data-parent="#{{ $parentID }}">
        <article class="card-body">
            {{ $slot }}
        </article>
    </section>
    <section>

        @if ($attributes->has('footer'))
            <article class="card-footer">
                <p class="text-center">Documento Validado por el {{$departamento}}</p>
            </article>
        @endif
       
    </section>
</section>