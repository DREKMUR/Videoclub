@extends('layouts.master')

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- Header --}}
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Catálogo de Películas</h1>
            <a href="{{ route('catalog.create') }}"
               class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 transition">
                + Nueva película
            </a>
        </div>

        {{-- Tabla --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500">#</th>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500">Título</th>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500">Año</th>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500">Director</th>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500">Póster</th>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500">Estado</th>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500">Sinopsis</th>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500">Creado el</th>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500">Actualizado el</th>
                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-gray-500 text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse ($peliculas as $pelicula)
                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="px-4 py-3 text-gray-400 text-xs">{{ $pelicula->id }}</td>

                            <td class="px-4 py-3 font-medium text-gray-800 max-w-[150px] truncate">
                                {{ $pelicula->title }}
                            </td>

                            <td class="px-4 py-3 text-gray-600">{{ $pelicula->year }}</td>

                            <td class="px-4 py-3 text-gray-600 max-w-[130px] truncate">
                                {{ $pelicula->director }}
                            </td>

                            <td class="px-4 py-3">
                                @if ($pelicula->poster)
                                    <img src="{{ $pelicula->poster }}"
                                         alt="{{ $pelicula->title }}"
                                         class="h-14 w-10 rounded object-cover shadow-sm">
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                @if ($pelicula->rented)
                                    <span class="rounded-full bg-red-100 px-2.5 py-1 text-xs font-medium text-red-600">
                                        Alquilada
                                    </span>
                                @else
                                    <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-600">
                                        Disponible
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-gray-500 max-w-[200px]">
                                <span class="line-clamp-2">{{ Str::limit($pelicula->synopsis, 80) }}</span>
                            </td>

                            <td class="px-4 py-3 text-gray-400 text-xs whitespace-nowrap">
                                {{ $pelicula->created_at ? $pelicula->created_at->format('d/m/Y H:i') : '—' }}
                            </td>

                            <td class="px-4 py-3 text-gray-400 text-xs whitespace-nowrap">
                                {{ $pelicula->updated_at ? $pelicula->updated_at->format('d/m/Y H:i') : '—' }}
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('catalog.show', $pelicula->id) }}"
                                       title="Ver"
                                       class="rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-medium text-blue-600 hover:bg-blue-100 transition">
                                        Ver
                                    </a>
                                    <a href="{{ route('catalog.edit', $pelicula->id) }}"
                                       title="Editar"
                                       class="rounded-lg bg-amber-50 px-3 py-1.5 text-xs font-medium text-amber-600 hover:bg-amber-100 transition">
                                        Editar
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="py-12 text-center text-gray-400">
                                No hay películas en el catálogo.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Footer paginación --}}
            <div class="flex items-center justify-between border-t border-gray-100 bg-gray-50 px-5 py-3">
                <div>
                    {{ $peliculas->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection
