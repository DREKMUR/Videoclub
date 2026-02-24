@extends('layouts.master')

@section('content')
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

<div class="bg-white rounded-2xl shadow-lg overflow-hidden max-w-3xl w-full flex flex-col sm:flex-row">
    <img
        src="{{ $pelicula['poster'] }}"
        alt="Póster de la película"
        class="w-full sm:w-64 object-cover"
    >

    <div class="p-8 flex flex-col gap-4 flex-1">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">{{ $pelicula['title'] }}</h2>
            <p class="text-sm text-gray-500 mt-1">{{ $pelicula['year'] }} &middot; {{ $pelicula['director'] }}</p>
        </div>

        <p class="text-gray-600 text-sm leading-relaxed">
            <span class="font-semibold text-gray-800">Resumen: </span>
            {{ $pelicula['synopsis'] }}
        </p>

        @if ($pelicula['rented'])
            <span class="inline-flex items-center gap-2 text-sm font-medium text-red-600 bg-red-50 px-3 py-1.5 rounded-full w-fit">
                    <span class="w-2 h-2 rounded-full bg-red-500"></span>
                    Película alquilada
                </span>
        @else
            <span class="inline-flex items-center gap-2 text-sm font-medium text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full w-fit">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    Película disponible
                </span>
        @endif

        <div class="flex flex-wrap gap-2 mt-auto pt-2">

            @if ($pelicula['rented'])
                <button class="bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                    Devolver película
                </button>
            @else
                <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                    Alquilar película
                </button>
            @endif

            <a href="#" class="bg-amber-400 hover:bg-amber-500 text-white text-sm font-medium px-4 py-2 rounded-lg transition">
                Editar película
            </a>

            <a href="{{ route('catalog') }}" class="border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-medium px-4 py-2 rounded-lg transition">
                Volver al listado
            </a>

        </div>

    </div>
</div>

</body>
@endsection
