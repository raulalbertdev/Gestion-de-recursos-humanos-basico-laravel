{{-- <x-informacion-contratado :controls="array()"></x-informacion-contratado> --}}
<section class="container p-2 bg-light">
    <article class="row">
        @foreach ($controls as $item)
            <div class="col-12 row">
                <div class="col-6 py-2 bg-dark text-white d-flex justify-content-center border border-white">{{ $item['text'] }}</div>
                <div class="col-6 py-2 d-flex justify-content-center border border-dark">{{ $item['value'] }}</div>
            </div>
        @endforeach
    </article>
</section>