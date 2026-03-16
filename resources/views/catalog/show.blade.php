@extends('layouts.master')

@section('content')
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
        <div class="md:w-1/3 bg-gray-50 flex items-center justify-center p-6">
            <img src="{{ $pelicula->poster }}" alt="Poster de {{ $pelicula->title }}" class="w-full max-w-sm h-auto rounded-lg shadow-md object-cover">
        </div>
        <div class="md:w-2/3 p-8 flex flex-col justify-between">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $pelicula->title }}</h1>
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-100">
                        <span class="block text-sm text-slate-500 font-semibold uppercase tracking-wider">Año</span>
                        <span class="text-lg font-medium text-slate-800">{{ $pelicula->year }}</span>
                    </div>
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-100">
                        <span class="block text-sm text-slate-500 font-semibold uppercase tracking-wider">Director</span>
                        <span class="text-lg font-medium text-slate-800">{{ $pelicula->director }}</span>
                    </div>
                </div>

                <div class="mb-8">
                    <span class="block text-sm text-slate-500 font-semibold uppercase tracking-wider mb-2">Sinopsis</span>
                    <p class="text-slate-700 leading-relaxed text-lg">{{ $pelicula->synopsis }}</p>
                </div>

                <div class="mb-8">
                    <span class="block text-sm text-slate-500 font-semibold uppercase tracking-wider mb-2">Estado</span>
                    @if($pelicula->rented)
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-red-100 text-red-800">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                        Película actualmente alquilada
                    </span>
                    @else
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-green-100 text-green-800">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        Película disponible
                    </span>
                    @endif
                </div>
            </div>

            @if(Auth::check())
                <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-100">
                    @if($pelicula->rented)
                        <form action="/catalog/return/{{ $pelicula->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition">
                                Devolver película
                            </button>
                        </form>
                    @else
                        <form action="/catalog/rent/{{ $pelicula->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition">
                                Alquilar película
                            </button>
                        </form>
                    @endif

                    <a href="/catalog/edit/{{ $pelicula->id }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-medium rounded-lg text-amber-900 bg-amber-400 hover:bg-amber-500 shadow-sm transition">
                        Editar película
                    </a>

                    <form action="/catalog/delete/{{ $pelicula->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 shadow-sm transition">
                            Eliminar película
                        </button>
                    </form>

                    <a href="/catalog" class="inline-flex items-center justify-center px-5 py-3 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition ml-auto">
                        Volver al catálogo
                    </a>
                </div>
            @else
                <div class="pt-6 border-t border-gray-100">
                    <a href="/catalog" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition">
                        Volver al catálogo
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
