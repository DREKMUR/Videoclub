@extends('layouts.master')

@section('content')
    <div class="flex justify-center items-center min-h-[70vh]">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-2xl border border-gray-100">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-8">Registrarse</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo Electrónico</label>
                    <input id="email" type="email" name="email" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm">
                </div>
                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre usuario</label>
                    <input id="name" type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm">
                </div>
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmar
                        Contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                    Entrar
                </button>
            </form>
        </div>
    </div>
@endsection
