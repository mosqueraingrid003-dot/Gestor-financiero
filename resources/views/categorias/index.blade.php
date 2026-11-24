<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categorías
        </h2>
    </x-slot>

    <style>
        .cat-pagina {
            max-width: 1150px;
            margin: 0 auto;
            padding: 32px 20px;
        }

        .cat-cabecera {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 30px;
            margin-bottom: 24px;
            border-radius: 20px;
            background: linear-gradient(120deg, #172554, #1d4ed8);
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.14);
        }

        .cat-etiqueta {
            margin: 0 0 8px;
            color: #bfdbfe;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .cat-cabecera h1 {
            margin: 0 0 10px;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 800;
        }

        .cat-cabecera p.cat-descripcion {
            margin: 0;
            max-width: 560px;
            color: #dbeafe;
            font-size: 14px;
            line-height: 1.7;
        }

        .cat-crear {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border: 1px solid #ffffff;
            border-radius: 10px;
            background: #ffffff;
            color: #1e40af;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .cat-crear:hover {
            background: #dbeafe;
        }

        .cat-alerta {
            margin-bottom: 20px;
            padding: 15px 18px;
            border: 1px solid;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.6;
        }

        .cat-exito {
            background: #ecfdf5;
            border-color: #a7f3d0;
            color: #065f46;
        }

        .cat-error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        .cat-panel {
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.05);
        }

        .cat-panel-titulo {
            padding: 22px 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .cat-panel-titulo h2 {
            margin: 0 0 5px;
            color: #172554;
            font-size: 18px;
            font-weight: 700;
        }

        .cat-panel-titulo p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .cat-tabla-contenedor {
            overflow-x: auto;
        }

        .cat-tabla {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
            text-align: left;
        }

        .cat-tabla thead {
            background: #eff6ff;
        }

        .cat-tabla th {
            padding: 15px 24px;
            color: #1e3a8a;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.7px;
            text-transform: uppercase;
        }

        .cat-tabla td {
            padding: 18px 24px;
            border-bottom: 1px solid #f1f5f9;
            color: #475569;
            font-size: 14px;
            vertical-align: middle;
        }

        .cat-tabla tbody tr:hover {
            background: #f8fafc;
        }

        .cat-tabla .cat-nombre {
            color: #0f172a;
            font-weight: 600;
        }

        .cat-detalle {
            min-width: 180px;
            max-width: 360px;
            overflow-wrap: anywhere;
        }

        .cat-tipo {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
        }

        .cat-ingreso {
            background: #d1fae5;
            color: #065f46;
        }

        .cat-gasto {
            background: #fee2e2;
            color: #991b1b;
        }

        .cat-acciones {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .cat-acciones form {
            margin: 0;
        }

        .cat-editar,
        .cat-eliminar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.4;
            text-decoration: none;
            cursor: pointer;
        }

        .cat-editar {
            background: #dbeafe;
            color: #1e40af;
        }

        .cat-editar:hover {
            background: #bfdbfe;
        }

        .cat-eliminar {
            background: #fee2e2;
            color: #991b1b;
        }

        .cat-eliminar:hover {
            background: #fecaca;
        }

        .cat-crear:focus-visible,
        .cat-editar:focus-visible,
        .cat-eliminar:focus-visible,
        .cat-volver:focus-visible {
            outline: 3px solid #2563eb;
            outline-offset: 4px;
        }

        .cat-tabla .cat-vacio {
            padding: 40px 24px;
            color: #64748b;
            text-align: center;
        }

        .cat-paginacion {
            padding: 20px 24px;
        }

        .cat-pie {
            margin-top: 22px;
        }

        .cat-volver {
            display: inline-block;
            color: #1d4ed8;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .cat-volver:hover {
            text-decoration: underline;
        }

        @media (max-width: 640px) {
            .cat-pagina {
                padding: 24px 16px;
            }

            .cat-cabecera {
                padding: 24px;
            }

            .cat-crear {
                width: 100%;
            }
        }
    </style>

    <div class="cat-pagina">
        <section class="cat-cabecera">
            <div>
                <p class="cat-etiqueta">Gestor financiero</p>

                <h1>Organiza tus categorías</h1>

                <p class="cat-descripcion">
                    Clasifica tus ingresos y gastos para identificar
                    de dónde viene tu dinero y en qué lo utilizas.
                </p>
            </div>

            <a href="{{ route('categorias.create') }}" class="cat-crear">
                + Crear categoría
            </a>
        </section>

        @if(session('success'))
            <div class="cat-alerta cat-exito" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="cat-alerta cat-error" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <section class="cat-panel" aria-labelledby="cat-listado-titulo">
            <div class="cat-panel-titulo">
                <h2 id="cat-listado-titulo">Categorías registradas</h2>
                <p>Consulta y administra tus categorías de ingreso y gasto.</p>
            </div>

            <div class="cat-tabla-contenedor">
                <table class="cat-tabla" aria-labelledby="cat-listado-titulo">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($categorias as $categoria)
                            <tr>
                                <td class="cat-nombre">
                                    {{ $categoria->nombre }}
                                </td>

                                <td>
                                    <span class="cat-tipo {{ $categoria->tipo === 'ingreso' ? 'cat-ingreso' : 'cat-gasto' }}">
                                        {{ ucfirst($categoria->tipo) }}
                                    </span>
                                </td>

                                <td class="cat-detalle">
                                    {{ $categoria->descripcion ?: 'Sin descripción' }}
                                </td>

                                <td>
                                    <div class="cat-acciones">
                                        <a
                                            href="{{ route('categorias.edit', $categoria) }}"
                                            class="cat-editar"
                                            aria-label="Editar categoría {{ $categoria->nombre }}"
                                        >
                                            Editar
                                        </a>

                                        <form
                                            action="{{ route('categorias.destroy', $categoria) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Eliminar esta categoría?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="cat-eliminar"
                                                aria-label="Eliminar categoría {{ $categoria->nombre }}"
                                            >
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="cat-vacio">
                                    No hay categorías registradas.
                                    Usa el botón “Crear categoría” para comenzar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($categorias->hasPages())
                <div class="cat-paginacion">
                    {{ $categorias->links() }}
                </div>
            @endif
        </section>

        <div class="cat-pie">
            <a href="{{ route('dashboard') }}" class="cat-volver">
                &larr; Volver al inicio
            </a>
        </div>
    </div>
</x-app-layout>