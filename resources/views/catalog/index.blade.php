<div class="row">
    @foreach ($arrayPeliculas as $key => $pelicula)
        <div class="col-xs-6 col-sm-4 col-md-3 text-center"> <a href="{{ route('catalog.show', $key) }}"> <img
                    src="{{ $pelicula['poster'] }}" style="height:200px" />
                <h4 style="min-height: 45px; margin:5px 0 10px 0"> {{ $pelicula['title'] }} </h4>
            </a> </div>
    @endforeach
</div>

<div class="row">
    <div class="col-sm-4">
        <img src="{{ $pelicula['poster'] }}" style="width:100%" alt="Póster de la película">
    </div>
    <div class="col-sm-8">
        <h2>{{ $pelicula['title'] }}</h2>
        <h4>Año: {{ $pelicula['year'] }}</h4>
        <h4>Director: {{ $pelicula['director'] }}</h4>
        <p><strong>Resumen:</strong> {{ $pelicula['synopsis'] }}</p>

        <p><strong>Estado: </strong>
            @if ($pelicula['rented'])
                Película actualmente alquilada.
            @else
                Película disponible.
            @endif
        </p>

        @if ($pelicula['rented'])
            <button class="btn btn-danger">Devolver película</button>
        @else
            <button class="btn btn-primary">Alquilar película</button>
        @endif

        <a class="btn btn-warning" href="{{ route('catalog.edit', $id) }}">Editar película</a> <a
            class="btn btn-default btn-outline-dark" href="{{ route('catalog') }}">Volver al listado</a>
    </div>
</div>
