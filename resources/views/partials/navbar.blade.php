<nav class="bg-indigo-900 text-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex-shrink-0">
                <a href="/catalog" class="text-2xl font-extrabold tracking-tight">📽️ Videoclub</a>
            </div>
            <div class="flex items-center space-x-6">
                <a href="/catalog" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition">Catálogo</a>

                <a href="/catalog/table" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition">Tabla</a>
                @if(Auth::check())
                    <a href="/catalog/create" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition">Añadir Película</a>
                    <form action="/logout" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md text-sm font-medium transition shadow-sm">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    <a href="/login" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 rounded-md text-sm font-medium transition shadow-sm">Iniciar Sesión</a>
                    <a href="/register" class="px-4 py-2 border border-indigo-400 hover:bg-indigo-800 rounded-md text-sm font-medium transition">Registrarse</a>
                @endif
            </div>
        </div>
    </div>
</nav>
