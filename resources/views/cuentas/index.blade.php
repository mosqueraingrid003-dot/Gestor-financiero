<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cuentas
        </h2>
    </x-slot>

    <style>
        .cta-pagina {
            max-width: 1150px;
            margin: 0 auto;
            padding: 32px 20px;
        }

        .cta-cabecera {
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

        .cta-etiqueta {
            margin: 0 0 8px;
            color: #bfdbfe;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .cta-cabecera h1 {
            margin: 0 0 10px;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 800;
        }

        .cta-descripcion {
            margin: 0;
            max-width: 560px;
            color: #dbeafe;
            font-size: 14px;
            line-height: 1.7;
        }

        .cta-crear {
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

        .cta-crear:hover {
            background: #dbeafe;
        }

        .cta-alerta {
            margin-bottom: 20px;
            padding: 15px 18px;
            border: 1px solid;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.6;
        }

        .cta-exito {
            background: #ecfdf5;
            border-color: #a7f3d0;
            color: #065f46;
        }

        .cta-error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        .cta-panel {
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.05);
        }

        .cta-panel-titulo {
            padding: 22px 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .cta-panel-titulo h2 {
            margin: 0 0 5px;
            color: #172554;
            font-size: 18px;
            font-weight: 700;
        }

        .cta-panel-titulo p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .cta-tabla-contenedor {
            overflow-x: auto;
        }

        .cta-tabla {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
            text-align: left;
        }

        .cta-tabla thead {
            background: #eff6ff;
        }

        .cta-tabla th {
            padding: 15px 20px;
            color: #1e3a8a;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.7px;
            text-transform: uppercase;
        }

        .cta-tabla td {
            padding: 18px 20px;
            border-bottom: 1px solid #f1f5f9;
            color: #475569;
            font-size: 14px;
            vertical-align: middle;
        }

        .cta-tabla tbody tr:hover {
            background: #f8fafc;
        }

        .cta-tabla .cta-nombre {
            color: #0f172a;
            font-weight: 600;
        }

        .cta-detalle {
            min-width: 150px;
            max-width: 280px;
            overflow-wrap: anywhere;
        }

        .cta-tabla .cta-columna-saldo {
            text-align: right;
        }

        .cta-saldo {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 700;
            font-variant-numeric: tabular-nums;
            white-space: nowrap;
        }

        .cta-saldo-positivo {
            background: #ecfdf5;
            color: #065f46;
        }

        .cta-saldo-cero {
            background: #f1f5f9;
            color: #475569;
        }

        .cta-saldo-negativo {
            background: #fef2f2;
            color: #991b1b;
        }

        .cta-moneda {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 8px;
            background: #eff6ff;
            color: #1e40af;
            font-size: 12px;
            font-weight: 700;
        }

        .cta-tabla .cta-columna-movimientos {
            text-align: center;
        }

        .cta-movimientos {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            padding: 6px 10px;
            border-radius: 30px;
            background: #ede9fe;
            color: #5b21b6;
            font-size: 13px;
            font-weight: 700;
        }

        .cta-acciones {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .cta-acciones form {
            margin: 0;
        }

        .cta-editar,
        .cta-eliminar {
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

        .cta-editar {
            background: #dbeafe;
            color: #1e40af;
        }

        .cta-editar:hover {
            background: #bfdbfe;
        }

        .cta-eliminar {
            background: #fee2e2;
            color: #991b1b;
        }

        .cta-eliminar:hover {
            background: #fecaca;
        }

        .cta-crear:focus-visible,
        .cta-editar:focus-visible,
        .cta-eliminar:focus-visible,
        .cta-volver:focus-visible {
            outline: 3px solid #2563eb;
            outline-offset: 4px;
        }

        .cta-tabla .cta-vacio {
            padding: 40px 24px;
            color: #64748b;
            text-align: center;
        }

        .cta-paginacion {
            padding: 20px 24px;
        }

        .cta-nota {
            margin-top: 20px;
            padding: 16px 20px;
            border-left: 4px solid #2563eb;
            border-radius: 10px;
            background: #eff6ff;
            color: #1e3a8a;
            font-size: 14px;
            line-height: 1.7;
        }

        .cta-pie {
            margin-top: 22px;
        }

        .cta-volver {
            display: inline-block;
            color: #1d4ed8;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .cta-volver:hover {
            text-decoration: underline;
        }

        @media (max-width: 640px) {
            .cta-pagina {
                padding: 24px 16px;
            }

            .cta-cabecera {
                padding: 24px;
            }

            .cta-crear {
                width: 100%;
            }
        }
    </style>

    <div class="cta-pagina">
        <section class="cta-cabecera">
            <div>
                <p class="cta-etiqueta">Gestor financiero</p>

                <h1>Administra tus cuentas</h1>

                <p class="cta-descripcion">
                    Consulta tus saldos y mantén organizado
                    el dinero de tus diferentes cuentas.
                </p>
            </div>

            <a href="{{ route('cuentas.create') }}" class="cta-crear">
                + Crear cuenta
            </a>
        </section>

        @if(session('success'))
            <div class="cta-alerta cta-exito" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="cta-alerta cta-error" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <section class="cta-panel" aria-labelledby="cta-listado-titulo">
            <div class="cta-panel-titulo">
                <h2 id="cta-listado-titulo">Cuentas registradas</h2>

                <p>
                    Revisa el saldo y la cantidad de movimientos de cada cuenta.
                </p>
            </div>

            <div class="cta-tabla-contenedor">
                <table class="cta-tabla" aria-labelledby="cta-listado-titulo">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col" class="cta-columna-saldo">
                                Saldo
                            </th>
                            <th scope="col">Moneda</th>
                            <th scope="col" class="cta-columna-movimientos">
                                Movimientos
                            </th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($cuentas as $cuenta)
                            <tr>
                                <td class="cta-nombre">
                                    {{ $cuenta->nombre }}
                                </td>

                                <td class="cta-detalle">
                                    {{ $cuenta->descripcion ?: 'Sin descripción' }}
                                </td>

                                <td class="cta-columna-saldo">
                                    <span class="cta-saldo {{ $cuenta->saldo > 0 ? 'cta-saldo-positivo' : ($cuenta->saldo < 0 ? 'cta-saldo-negativo' : 'cta-saldo-cero') }}">
                                        ${{ number_format($cuenta->saldo, 2) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="cta-moneda">
                                        {{ $cuenta->moneda }}
                                    </span>
                                </td>

                                <td class="cta-columna-movimientos">
                                    <span class="cta-movimientos">
                                        {{ $cuenta->transacciones_count }}
                                    </span>
                                </td>

                                <td>
                                    <div class="cta-acciones">
                                        <a
                                            href="{{ route('cuentas.edit', $cuenta) }}"
                                            class="cta-editar"
                                            aria-label="Editar cuenta {{ $cuenta->nombre }}"
                                        >
                                            Editar
                                        </a>

                                        <form
                                            action="{{ route('cuentas.destroy', $cuenta) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Eliminar esta cuenta?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="cta-eliminar"
                                                aria-label="Eliminar cuenta {{ $cuenta->nombre }}"
                                            >
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="cta-vacio">
                                    No hay cuentas registradas.
                                    Usa el botón “Crear cuenta” para comenzar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($cuentas->hasPages())
                <div class="cta-paginacion">
                    {{ $cuentas->links() }}
                </div>
            @endif
        </section>

        <aside class="cta-nota">
            Consulta tus movimientos desde el módulo de Transacciones.
        </aside>

        <div class="cta-pie">
            <a href="{{ route('dashboard') }}" class="cta-volver">
                &larr; Volver al inicio
            </a>
        </div>
    </div>
</x-app-layout>