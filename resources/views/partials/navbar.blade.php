<nav class="bg-gray-100 border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex justify-between h-16">

            <div class="flex items-center">
                <a class="text-xl font-bold text-gray-600 hover:text-gray-800 flex items-center gap-2" href="/">
                    <span style="font-size:15pt">&#9820;</span> Videoclub
                </a>
            </div>

            @if( true || Auth::check() )
                <div class="hidden md:flex space-x-8 items-center">
                    <div class="flex space-x-4">
                        <a href="{{url('/catalog')}}"
                           class="{{ Request::is('catalog') && ! Request::is('catalog/create') ? 'text-blue-600 font-semibold' : 'text-gray-500 hover:text-gray-700' }} px-3 py-2 text-sm font-medium transition-colors">
                            <span aria-hidden="true"></span> Catálogo
                        </a>

                        <a href="{{url('/catalog/create')}}"
                           class="{{ Request::is('catalog/create') ? 'text-blue-600 font-semibold' : 'text-gray-500 hover:text-gray-700' }} px-3 py-2 text-sm font-medium transition-colors">
                            <span>&#10010;</span> Nueva película
                        </a>
                    </div>
                </div>

                <div class="flex items-center">
                    <form action="{{ url('/logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="text-gray-500 hover:text-red-600 text-sm font-medium transition-colors cursor-pointer">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            @endif

        </div>
    </div>
</nav>
