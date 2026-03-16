@extends('layouts.master')

@section('content')
    <div class="min-h-screen bg-gray-950 flex items-center justify-center px-4 py-16">

        {{-- Fondo decorativo con gradiente --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -left-40 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-orange-600/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative w-full max-w-2xl">

            {{-- Cabecera exterior --}}
            <div class="flex items-center gap-3 mb-6 px-1">
                <div class="w-8 h-px bg-amber-500"></div>
                <span class="text-amber-400 text-xs font-semibold tracking-[0.25em] uppercase">Catálogo</span>
            </div>

            {{-- Tarjeta principal --}}
            <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden shadow-2xl shadow-black/60">

                {{-- Header de la tarjeta --}}
                <div class="relative bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 px-8 py-6 border-b border-gray-800">
                    <div class="flex items-center gap-4">
                        {{-- Icono de película --}}
                        <div class="flex-shrink-0 w-12 h-12 bg-amber-500/15 border border-amber-500/30 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-white text-xl font-bold tracking-tight">Modificar película</h2>
                            <p class="text-gray-500 text-sm mt-0.5">Actualiza los datos del catálogo</p>
                        </div>
                    </div>
                </div>

                {{-- Cuerpo del formulario --}}
                <div class="px-8 py-8">
                    <form action="{{ route('catalog.edit.put', $pelicula->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">

                            {{-- Título --}}
                            <div class="group">
                                <label for="title"
                                       class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">
                                    Título
                                </label>
                                <input type="text" name="title" id="title" value="{{ $pelicula->title }}"
                                       class="w-full bg-gray-800/60 border border-gray-700 text-white placeholder-gray-600
                                       rounded-xl px-4 py-3 text-sm
                                       focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20
                                       transition-all duration-200 hover:border-gray-600">
                            </div>

                            {{-- Año y Director en grid --}}
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="group">
                                    <label for="year"
                                           class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">
                                        Año
                                    </label>
                                    <input type="text" name="year" id="year" value="{{ $pelicula->year }}"
                                           class="w-full bg-gray-800/60 border border-gray-700 text-white placeholder-gray-600
                                           rounded-xl px-4 py-3 text-sm
                                           focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20
                                           transition-all duration-200 hover:border-gray-600">
                                </div>

                                <div class="group">
                                    <label for="director"
                                           class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">
                                        Director
                                    </label>
                                    <input type="text" name="director" id="director" value="{{ $pelicula->director }}"
                                           class="w-full bg-gray-800/60 border border-gray-700 text-white placeholder-gray-600
                                           rounded-xl px-4 py-3 text-sm
                                           focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20
                                           transition-all duration-200 hover:border-gray-600">
                                </div>
                            </div>

                            {{-- Poster --}}
                            <div class="group">
                                <label for="poster"
                                       class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">
                                    Poster <span class="text-gray-600 normal-case tracking-normal">(URL)</span>
                                </label>
                                <div class="relative">
                                <span class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M10.172 13.828a4 4 0 015.656 0l4 4a4 4 0 01-5.656 5.656l-1.102-1.101"/>
                                    </svg>
                                </span>
                                    <input type="text" name="poster" id="poster" value="{{ $pelicula->poster }}"
                                           class="w-full bg-gray-800/60 border border-gray-700 text-white placeholder-gray-600
                                           rounded-xl pl-10 pr-4 py-3 text-sm
                                           focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20
                                           transition-all duration-200 hover:border-gray-600">
                                </div>
                            </div>

                            {{-- Sinopsis --}}
                            <div class="group">
                                <label for="synopsis"
                                       class="block text-xs font-semibold text-gray-400 uppercase tracking-widest mb-2">
                                    Resumen
                                </label>
                                <textarea name="synopsis" id="synopsis" rows="4"
                                          class="w-full bg-gray-800/60 border border-gray-700 text-white placeholder-gray-600
                                       rounded-xl px-4 py-3 text-sm resize-none
                                       focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20
                                       transition-all duration-200 hover:border-gray-600">{{ $pelicula->synopsis }}</textarea>
                            </div>

                        </div>

                        {{-- Separador --}}
                        <div class="border-t border-gray-800 my-8"></div>

                        {{-- Botones --}}
                        <div class="flex items-center justify-between gap-4">
                            <a href="{{ route('catalog') }}"
                               class="text-sm text-gray-500 hover:text-gray-300 transition-colors duration-200 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Cancelar
                            </a>

                            <button type="submit"
                                    class="relative inline-flex items-center gap-2.5 bg-amber-500 hover:bg-amber-400
                                   text-gray-950 font-bold text-sm px-8 py-3 rounded-xl
                                   transition-all duration-200 shadow-lg shadow-amber-500/25
                                   hover:shadow-amber-400/40 hover:-translate-y-0.5 active:translate-y-0
                                   focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                                Guardar cambios
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            {{-- Pie decorativo --}}
            <p class="text-center text-gray-700 text-xs mt-6 tracking-wide">
                Los cambios se aplicarán inmediatamente al catálogo
            </p>
        </div>
    </div>
@endsection
