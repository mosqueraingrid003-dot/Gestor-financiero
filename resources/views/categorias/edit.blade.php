<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar categoría
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block mb-1">Nombre</label>
                            <input type="text" name="nombre"
                                value="{{ old('nombre', $categoria->nombre) }}"
                                class="w-full border rounded p-2">

                            @error('nombre')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Tipo</label>
                            <select name="tipo" class="w-full border rounded p-2">
                                <option value="ingreso" @selected(old('tipo', $categoria->tipo) == 'ingreso')>
                                    Ingreso
                                </option>
                                <option value="gasto" @selected(old('tipo', $categoria->tipo) == 'gasto')>
                                    Gasto
                                </option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Descripción</label>
                            <textarea name="descripcion"
                                class="w-full border rounded p-2">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                        </div>

                        <button
                            type="submit"
                            style="display: inline-block; background-color: #1d4ed8; color: #ffffff; font-weight: 700; padding: 10px 20px; border: 1px solid #1d4ed8; border-radius: 6px; cursor: pointer;"
                        >
                            Guardar cambios
                        </button>

                        <a href="{{ route('categorias.index') }}"
                            class="px-4 py-2 bg-gray-300 rounded">
                            Cancelar
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>