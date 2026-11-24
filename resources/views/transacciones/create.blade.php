<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva transacción
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form action="{{ route('transacciones.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block mb-1">Cuenta</label>
                            <select name="cuenta_id" class="w-full border rounded p-2">
                                <option value="">Selecciona una cuenta</option>

                                @foreach($cuentas as $cuenta)
                                    <option value="{{ $cuenta->id }}"
                                        @selected(old('cuenta_id') == $cuenta->id)>
                                        {{ $cuenta->nombre }} - Saldo: ${{ number_format($cuenta->saldo, 2) }}
                                    </option>
                                @endforeach
                            </select>

                            @error('cuenta_id')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Categoría</label>
                            <select name="categoria_id" class="w-full border rounded p-2">
                                <option value="">Selecciona una categoría</option>

                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        @selected(old('categoria_id') == $categoria->id)>
                                        {{ $categoria->nombre }} ({{ ucfirst($categoria->tipo) }})
                                    </option>
                                @endforeach
                            </select>

                            @error('categoria_id')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Tipo</label>
                            <select name="tipo" class="w-full border rounded p-2">
                                <option value="">Selecciona una opción</option>
                                <option value="ingreso" @selected(old('tipo') == 'ingreso')>
                                    Ingreso
                                </option>
                                <option value="gasto" @selected(old('tipo') == 'gasto')>
                                    Gasto
                                </option>
                            </select>

                            @error('tipo')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Monto</label>
                            <input type="number" step="0.01" min="0.01" name="monto"
                                value="{{ old('monto') }}"
                                class="w-full border rounded p-2">

                            @error('monto')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Fecha</label>
                            <input type="date" name="fecha"
                                value="{{ old('fecha', now()->format('Y-m-d')) }}"
                                class="w-full border rounded p-2">

                            @error('fecha')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1">Descripción</label>
                            <textarea name="descripcion"
                                class="w-full border rounded p-2">{{ old('descripcion') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            style="display: inline-block; background-color: #1d4ed8; color: #ffffff; font-weight: 700; padding: 10px 20px; border: 1px solid #1d4ed8; border-radius: 6px; cursor: pointer;"
                        >
                            Guardar transacción
                        </button>

                        <a href="{{ route('transacciones.index') }}"
                            class="px-4 py-2 bg-gray-300 rounded">
                            Cancelar
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>