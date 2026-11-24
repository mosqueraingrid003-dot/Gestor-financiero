<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transacciones
        </h2>
    </x-slot>

    <style>
        .trx-pagina {
            max-width: 1280px;
            margin: 0 auto;
            padding: 32px 20px;
        }

        .trx-cabecera {
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

        .trx-etiqueta {
            margin: 0 0 8px;
            color: #bfdbfe;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .trx-cabecera h1 {
            margin: 0 0 10px;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 800;
        }

        .trx-descripcion {
            margin: 0;
            max-width: 580px;
            color: #dbeafe;
            font-size: 14px;
            line-height: 1.7;
        }

        .trx-crear {
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

        .trx-crear:hover {
            background: #dbeafe;
        }

        .trx-alerta {
            margin-bottom: 20px;
            padding: 15px 18px;
            border: 1px solid;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.6;
        }

        .trx-exito {
            background: #ecfdf5;
            border-color: #a7f3d0;
            color: #065f46;
        }

        .trx-error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        .trx-lista-errores {
            margin: 0;
            padding-left: 20px;
            list-style: disc;
        }

        .trx-panel {
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.05);
        }

        .trx-panel-titulo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            padding: 22px 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .trx-panel-titulo h2 {
            margin: 0 0 5px;
            color: #172554;
            font-size: 18px;
            font-weight: 700;
        }

        .trx-panel-titulo p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .trx-leyenda {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .trx-tipo {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .trx-ingreso {
            background: #d1fae5;
            color: #065f46;
        }

        .trx-gasto {
            background: #fee2e2;
            color: #991b1b;
        }

        .trx-tabla-contenedor {
            overflow-x: auto;
        }

        .trx-tabla {
            width: 100%;
            min-width: 1050px;
            border-collapse: collapse;
            text-align: left;
        }

        .trx-tabla th {
            padding: 15px 18px;
            background: #eff6ff;
            color: #1e3a8a;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.7px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .trx-tabla td {
            padding: 18px;
            border-bottom: 1px solid #f1f5f9;
            color: #475569;
            font-size: 14px;
            vertical-align: middle;
        }

        .trx-tabla tbody tr:hover {
            background: #f8fafc;
        }

        .trx-tabla .trx-cuenta {
            color: #0f172a;
            font-weight: 600;
        }

        .trx-tabla .trx-columna-monto {
            text-align: right;
        }

        .trx-monto {
            font-weight: 700;
            font-variant-numeric: tabular-nums;
            white-space: nowrap;
        }

        .trx-monto-ingreso {
            color: #047857;
        }

        .trx-monto-gasto {
            color: #b91c1c;
        }

        .trx-fecha {
            font-variant-numeric: tabular-nums;
            white-space: nowrap;
        }

        .trx-detalle {
            min-width: 150px;
            max-width: 280px;
            overflow-wrap: anywhere;
        }

        .trx-usuario {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 8px;
            background: #f1f5f9;
            color: #334155;
            font-size: 12px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .trx-acciones {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            min-width: 145px;
        }

        .trx-acciones form {
            margin: 0;
        }

        .trx-editar,
        .trx-eliminar {
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

        .trx-editar {
            background: #dbeafe;
            color: #1e40af;
        }

        .trx-editar:hover {
            background: #bfdbfe;
        }

        .trx-eliminar {
            background: #fee2e2;
            color: #991b1b;
        }

        .trx-eliminar:hover {
            background: #fecaca;
        }

        .trx-crear:focus-visible,
        .trx-editar:focus-visible,
        .trx-eliminar:focus-visible,
        .trx-volver:focus-visible {
            outline: 3px solid #2563eb;
            outline-offset: 4px;
        }

        .trx-tabla .trx-vacio {
            padding: 40px 24px;
            color: #64748b;
            text-align: center;
        }

        .trx-paginacion {
            padding: 20px 24px;
        }

        .trx-nota {
            margin-top: 20px;
            padding: 16px 20px;
            border-left: 4px solid #2563eb;
            border-radius: 10px;
            background: #eff6ff;
            color: #1e3a8a;
            font-size: 14px;
            line-height: 1.7;
        }

        .trx-pie {
            margin-top: 22px;
        }

        .trx-volver {
            display: inline-block;
            color: #1d4ed8;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .trx-volver:hover {
            text-decoration: underline;
        }

        @media (max-width: 640px) {
            .trx-pagina {
                padding: 24px 16px;
            }

            .trx-cabecera {
                padding: 24px;
            }

            .trx-crear {
                width: 100%;
            }
        }
    </style>

    <div class="trx-pagina">
        <section class="trx-cabecera">
            <div>
                <p class="trx-etiqueta">Gestor financiero</p>

                <h1>Controla tus movimientos</h1>

                <p class="trx-descripcion">
                    Consulta tus ingresos y gastos y lleva
                    el registro de tus transacciones en un solo lugar.
                </p>
            </div>

            <a
                href="{{ route('transacciones.create') }}"
                class="trx-crear"
            >
                + Crear transacción
            </a>
        </section>

        @if(session('success'))
            <div class="trx-alerta trx-exito" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="trx-alerta trx-error" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="trx-alerta trx-error" role="alert">
                <ul class="trx-lista-errores">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section
            class="trx-panel"
            aria-labelledby="trx-listado-titulo"
        >
            <div class="trx-panel-titulo">
                <div>
                    <h2 id="trx-listado-titulo">
                        Transacciones registradas
                    </h2>

                    <p>
                        Revisa la cuenta, categoría y detalle de cada movimiento.
                    </p>
                </div>

                <div class="trx-leyenda" aria-label="Tipos de transacción">
                    <span class="trx-tipo trx-ingreso">Ingreso</span>
                    <span class="trx-tipo trx-gasto">Gasto</span>
                </div>
            </div>

            <div class="trx-tabla-contenedor">
                <table
                    class="trx-tabla"
                    aria-labelledby="trx-listado-titulo"
                >
                    <thead>
                        <tr>
                            <th scope="col">Cuenta</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Tipo</th>
                            <th scope="col" class="trx-columna-monto">
                                Monto
                            </th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Registró</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($transacciones as $transaccion)
                            <tr>
                                <td class="trx-cuenta">
                                    {{ $transaccion->cuenta->nombre }}
                                </td>

                                <td>
                                    {{ $transaccion->categoria->nombre }}
                                </td>

                                <td>
                                    <span class="trx-tipo {{ $transaccion->tipo === 'ingreso' ? 'trx-ingreso' : 'trx-gasto' }}">
                                        {{ ucfirst($transaccion->tipo) }}
                                    </span>
                                </td>

                                <td class="trx-columna-monto">
                                    <span class="trx-monto {{ $transaccion->tipo === 'ingreso' ? 'trx-monto-ingreso' : 'trx-monto-gasto' }}">
                                        ${{ number_format($transaccion->monto, 2) }}
                                    </span>
                                </td>

                                <td class="trx-fecha">
                                    {{ $transaccion->fecha->format('d/m/Y') }}
                                </td>

                                <td class="trx-detalle">
                                    {{ $transaccion->descripcion ?: 'Sin descripción' }}
                                </td>

                                <td>
                                    <span class="trx-usuario">
                                        {{ $transaccion->creado_por ?: 'Sin registro' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="trx-acciones">
                                        <a
                                            href="{{ route('transacciones.edit', $transaccion) }}"
                                            class="trx-editar"
                                            aria-label="Editar transacción {{ $transaccion->id }}"
                                        >
                                            Editar
                                        </a>

                                        <form
                                            action="{{ route('transacciones.destroy', $transaccion) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Eliminar esta transacción? Se revertirá su efecto sobre el saldo de la cuenta.');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="trx-eliminar"
                                                aria-label="Eliminar transacción {{ $transaccion->id }}"
                                            >
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="trx-vacio">
                                    No hay transacciones registradas.
                                    Usa el botón “Crear transacción” para comenzar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($transacciones->hasPages())
                <div class="trx-paginacion">
                    {{ $transacciones->links() }}
                </div>
            @endif
        </section>

        <aside class="trx-nota">
            Los ingresos aparecen en verde y los gastos en rojo.
            Consulta el saldo de cada cuenta desde el módulo de Cuentas.
        </aside>

        <div class="trx-pie">
            <a href="{{ route('dashboard') }}" class="trx-volver">
                &larr; Volver al inicio
            </a>
        </div>
    </div>
</x-app-layout>