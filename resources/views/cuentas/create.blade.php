<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva cuenta
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form action="{{ route('cuentas.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block mb-1">Nombre</label>
                            <input type="text" name="nombre"
                                value="{{ old('nombre') }}"
                                class="w-full border rounded p-2">

                            @error('nombre')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Descripción</label>
                            <textarea name="descripcion"
                                class="w-full border rounded p-2">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Saldo inicial</label>
                            <input type="number" step="0.01" min="0" name="saldo"
                                value="{{ old('saldo', 0) }}"
                                class="w-full border rounded p-2">

                            @error('saldo')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Moneda</label>
                            <input type="text" name="moneda"
                                value="{{ old('moneda', 'COP') }}"
                                class="w-full border rounded p-2">

                            @error('moneda')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <button
                            type="submit"
                            style="display: inline-block; background-color: #1d4ed8; color: #ffffff; font-weight: 700; padding: 10px 20px; border: 1px solid #1d4ed8; border-radius: 6px; cursor: pointer;"
                        >
                            Crear cuenta
                        </button>

                        <a href="{{ route('cuentas.index') }}"
                            class="px-4 py-2 bg-gray-300 rounded">
                            Cancelar
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>