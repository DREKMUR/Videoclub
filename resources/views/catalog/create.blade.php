@extends('layouts.master')

@section('content')
    <div class="flex justify-center items-center min-h-[80vh] py-10">
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

            <div class="bg-indigo-600 py-6">
                <h2 class="text-2xl font-bold text-center text-white uppercase tracking-wider">
                    Añadir Nueva Película
                </h2>
            </div>

            <div class="p-8 md:p-12">
                <form action="{{ action([App\Http\Controllers\CatalogController::class, 'postCreate']) }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Título de la película</label>
                        <input type="text" name="title" id="title" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none placeholder-gray-400 shadow-sm"
                               placeholder="Ej: El Padrino">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="year" class="block text-sm font-semibold text-gray-700 mb-2">Año de estreno</label>
                            <input type="text" name="year" id="year" required
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none placeholder-gray-400 shadow-sm"
                                   placeholder="Ej: 1972">
                        </div>

                        <div>
                            <label for="director" class="block text-sm font-semibold text-gray-700 mb-2">Director</label>
                            <input type="text" name="director" id="director" required
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none placeholder-gray-400 shadow-sm"
                                   placeholder="Nombre del director">
                        </div>
                    </div>

                    <div>
                        <label for="poster" class="block text-sm font-semibold text-gray-700 mb-2">URL del Póster</label>
                        <input type="text" name="poster" id="poster" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none placeholder-gray-400 shadow-sm"
                               placeholder="https://enlace-a-la-imagen.jpg">
                    </div>

                    <div>
                        <label for="synopsis" class="block text-sm font-semibold text-gray-700 mb-2">Resumen / Sinopsis</label>
                        <textarea name="synopsis" id="synopsis" rows="4" required
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none placeholder-gray-400 shadow-sm resize-none"
                                  placeholder="Escribe una breve descripción de la trama..."></textarea>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button type="submit"
                                class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-indigo-200 transition-all transform hover:-translate-y-1 active:scale-95">
                            Guardar película
                        </button>

                        <a href="{{ url('/catalog') }}"
                           class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-4 px-6 rounded-xl text-center transition-all">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
