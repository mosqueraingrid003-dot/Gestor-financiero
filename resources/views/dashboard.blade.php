<x-app-layout>
    <style>
        .gf-inicio {
            max-width: 1150px;
            margin: 0 auto;
            padding: 36px 20px;
        }

        .gf-bienvenida {
            background: linear-gradient(120deg, #172554, #1d4ed8);
            color: #ffffff;
            padding: 36px;
            border-radius: 20px;
            box-shadow: 0 12px 28px rgba(30, 64, 175, 0.16);
            margin-bottom: 28px;
        }

        .gf-etiqueta {
            margin: 0 0 12px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #bfdbfe;
        }

        .gf-bienvenida h1 {
            margin: 0 0 12px;
            font-size: clamp(26px, 4vw, 36px);
            line-height: 1.2;
            font-weight: 800;
        }

        .gf-descripcion {
            margin: 0;
            max-width: 620px;
            color: #dbeafe;
            font-size: 16px;
            line-height: 1.7;
        }

        .gf-fecha {
            display: inline-block;
            margin-top: 22px;
            padding: 8px 14px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 30px;
            font-size: 13px;
        }

        .gf-titulo {
            margin: 0 0 18px;
            font-size: 21px;
            font-weight: 700;
            color: #172554;
        }

        .gf-modulos {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
        }

        .gf-tarjeta {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 26px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
        }

        .gf-numero {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            margin-bottom: 18px;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 800;
        }

        .gf-categorias {
            background: #dbeafe;
            color: #1e40af;
        }

        .gf-cuentas {
            background: #d1fae5;
            color: #065f46;
        }

        .gf-transacciones {
            background: #ede9fe;
            color: #5b21b6;
        }

        .gf-tarjeta h3 {
            margin: 0 0 10px;
            color: #0f172a;
            font-size: 20px;
            font-weight: 700;
        }

        .gf-tarjeta p {
            margin: 0 0 24px;
            color: #475569;
            font-size: 14px;
            line-height: 1.7;
        }

        .gf-boton {
            display: inline-block;
            margin-top: auto;
            padding: 11px 18px;
            border-radius: 10px;
            background: #1d4ed8;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .gf-boton:hover {
            background: #1e3a8a;
        }

        .gf-boton:focus-visible {
            outline: 3px solid #2563eb;
            outline-offset: 4px;
        }

        .gf-nota {
            margin-top: 26px;
            padding: 18px 22px;
            border-left: 4px solid #2563eb;
            border-radius: 10px;
            background: #eff6ff;
            color: #1e3a8a;
            font-size: 14px;
            line-height: 1.7;
        }

        @media (max-width: 800px) {
            .gf-modulos {
                grid-template-columns: 1fr;
            }

            .gf-bienvenida {
                padding: 26px;
            }
        }
    </style>

    <div class="gf-inicio">
        <section class="gf-bienvenida">
            <p class="gf-etiqueta">Gestor financiero</p>

            <h1>
                Hola, {{ auth()->user()->name }}
            </h1>

            <p class="gf-descripcion">
                Organiza tus ingresos, controla tus gastos y lleva
                tus cuentas en un solo lugar.
            </p>

            <span class="gf-fecha">
                Panel de inicio · {{ now()->format('d/m/Y') }}
            </span>
        </section>

        <h2 class="gf-titulo">Administra tus finanzas</h2>

        <div class="gf-modulos">
            <section class="gf-tarjeta">
                <span class="gf-numero gf-categorias" aria-hidden="true">
                    01
                </span>

                <h3>Categorías</h3>

                <p>
                    Clasifica tus ingresos y gastos para mantener
                    tus movimientos organizados.
                </p>

                <a href="{{ route('categorias.index') }}" class="gf-boton">
                    Ver categorías
                </a>
            </section>

            <section class="gf-tarjeta">
                <span class="gf-numero gf-cuentas" aria-hidden="true">
                    02
                </span>

                <h3>Cuentas</h3>

                <p>
                    Consulta el saldo de tus cuentas y administra
                    dónde guardas tu dinero.
                </p>

                <a href="{{ route('cuentas.index') }}" class="gf-boton">
                    Ver cuentas
                </a>
            </section>

            <section class="gf-tarjeta">
                <span class="gf-numero gf-transacciones" aria-hidden="true">
                    03
                </span>

                <h3>Transacciones</h3>

                <p>
                    Registra tus ingresos y gastos y consulta
                    el detalle de tus movimientos.
                </p>

                <a href="{{ route('transacciones.index') }}" class="gf-boton">
                    Ver transacciones
                </a>
            </section>
        </div>

        <aside class="gf-nota">
            Mantén tus movimientos al día para conocer el saldo
            disponible de tus cuentas.
        </aside>
    </div>
</x-app-layout>