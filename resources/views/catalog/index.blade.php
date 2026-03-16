@extends('layouts.master')

@section('content')
<body class="bg-gray-100 min-h-screen p-8">

<h1 class="text-3xl font-bold text-gray-800 mb-8">Catálogo de películas</h1>

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
    @foreach ($arrayPeliculas as $key => $pelicula)
        <a href="{{ route('catalog.show', $pelicula->id) }}"
           class="bg-white rounded-xl overflow-hidden shadow hover:shadow-md hover:-translate-y-1 transition-all duration-200 flex flex-col">

            <img
                src="{{ $pelicula->poster }}"
                alt="{{ $pelicula->title }}"
                class="w-full h-52 object-cover"
            >

            <div class="p-3 flex-1 flex items-center justify-center">
                <h4 class="text-sm font-semibold text-gray-800 text-center leading-snug line-clamp-2">
                    {{ $pelicula->title }}
                </h4>
            </div>

        </a>
    @endforeach
</div>

<div class="mt-12">
    {{ $arrayPeliculas->links() }}
</div>

</body>
@endsection
