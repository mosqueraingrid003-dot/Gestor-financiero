<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cuenta;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::with(['cuenta', 'categoria'])
            ->latest('fecha')
            ->latest('id')
            ->paginate(10);

        return view('transacciones.index', compact('transacciones'));
    }

    public function create()
    {
        $cuentas = Cuenta::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();

        return view('transacciones.create', compact('cuentas', 'categorias'));
    }

    public function store(Request $request)
    {
$datos = $request->validate([
    'cuenta_id' => 'required|exists:cuentas,id',
    'categoria_id' => 'required|exists:categorias,id',
    'tipo' => 'required|in:ingreso,gasto',
    'monto' => 'required|numeric|gt:0',
    'fecha' => 'required|date',
    'descripcion' => 'nullable|string|max:255',
], [
    'cuenta_id.required' => 'Debes seleccionar una cuenta.',
    'cuenta_id.exists' => 'La cuenta seleccionada no existe.',

    'categoria_id.required' => 'Debes seleccionar una categoría.',
    'categoria_id.exists' => 'La categoría seleccionada no existe.',

    'tipo.required' => 'Debes seleccionar el tipo de transacción.',
    'tipo.in' => 'El tipo debe ser ingreso o gasto.',

    'monto.required' => 'Debes ingresar el monto de la transacción.',
    'monto.numeric' => 'El monto debe ser un número válido.',
    'monto.gt' => 'El monto debe ser mayor que cero.',

    'fecha.required' => 'Debes seleccionar una fecha.',
    'fecha.date' => 'Debes ingresar una fecha válida.',

    'descripcion.string' => 'La descripción debe ser un texto.',
    'descripcion.max' => 'La descripción no puede superar los 255 caracteres.',
]);

        $categoria = Categoria::findOrFail($datos['categoria_id']);
        $cuenta = Cuenta::findOrFail($datos['cuenta_id']);

        if ($categoria->tipo !== $datos['tipo']) {
            throw ValidationException::withMessages([
                'categoria_id' => 'La categoría seleccionada no corresponde al tipo de transacción.',
            ]);
        }

        if ($datos['tipo'] === 'gasto' && $datos['monto'] > $cuenta->saldo) {
            throw ValidationException::withMessages([
                'monto' => 'El gasto supera el saldo disponible de la cuenta.',
            ]);
        }

        DB::transaction(function () use ($datos, $cuenta) {
            Transaccion::create($datos + [
                'creado_por' => auth()->user()->name,
            ]);

            if ($datos['tipo'] === 'ingreso') {
                $cuenta->increment('saldo', $datos['monto']);
            } else {
                $cuenta->decrement('saldo', $datos['monto']);
            }
        });

        return redirect()
            ->route('transacciones.index')
            ->with('success', 'Transacción registrada correctamente.');
    }

    public function edit(Transaccion $transaccion)
    {
        $cuentas = Cuenta::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();

        return view('transacciones.edit', compact(
            'transaccion',
            'cuentas',
            'categorias'
        ));
    }

    public function update(Request $request, Transaccion $transaccion)
    {
    $datos = $request->validate([
        'cuenta_id' => 'required|exists:cuentas,id',
        'categoria_id' => 'required|exists:categorias,id',
        'tipo' => 'required|in:ingreso,gasto',
        'monto' => 'required|numeric|gt:0',
        'fecha' => 'required|date',
        'descripcion' => 'nullable|string|max:255',
    ], [
        'cuenta_id.required' => 'Debes seleccionar una cuenta.',
        'cuenta_id.exists' => 'La cuenta seleccionada no existe.',

        'categoria_id.required' => 'Debes seleccionar una categoría.',
        'categoria_id.exists' => 'La categoría seleccionada no existe.',

        'tipo.required' => 'Debes seleccionar el tipo de transacción.',
        'tipo.in' => 'El tipo debe ser ingreso o gasto.',

        'monto.required' => 'Debes ingresar el monto de la transacción.',
        'monto.numeric' => 'El monto debe ser un número válido.',
        'monto.gt' => 'El monto debe ser mayor que cero.',

        'fecha.required' => 'Debes seleccionar una fecha.',
        'fecha.date' => 'Debes ingresar una fecha válida.',

        'descripcion.string' => 'La descripción debe ser un texto.',
        'descripcion.max' => 'La descripción no puede superar los 255 caracteres.',
    ]);

        $categoria = Categoria::findOrFail($datos['categoria_id']);
        $cuentaNueva = Cuenta::findOrFail($datos['cuenta_id']);

        if ($categoria->tipo !== $datos['tipo']) {
            throw ValidationException::withMessages([
                'categoria_id' => 'La categoría seleccionada no corresponde al tipo de transacción.',
            ]);
        }

        DB::transaction(function () use ($transaccion, $datos, $cuentaNueva) {
            $cuentaAnterior = $transaccion->cuenta;

            // Revertir el efecto anterior
            if ($transaccion->tipo === 'ingreso') {
                $cuentaAnterior->decrement('saldo', $transaccion->monto);
            } else {
                $cuentaAnterior->increment('saldo', $transaccion->monto);
            }

            $cuentaNueva->refresh();

            if ($datos['tipo'] === 'gasto' && $datos['monto'] > $cuentaNueva->saldo) {
                throw ValidationException::withMessages([
                    'monto' => 'El gasto supera el saldo disponible de la cuenta.',
                ]);
            }

            $transaccion->update($datos);

            // Aplicar el nuevo efecto
            if ($datos['tipo'] === 'ingreso') {
                $cuentaNueva->increment('saldo', $datos['monto']);
            } else {
                $cuentaNueva->decrement('saldo', $datos['monto']);
            }
        });

        return redirect()
            ->route('transacciones.index')
            ->with('success', 'Transacción actualizada correctamente.');
    }

    public function destroy(Transaccion $transaccion)
    {
        DB::transaction(function () use ($transaccion) {
            $cuenta = $transaccion->cuenta;

            if ($transaccion->tipo === 'ingreso') {
                $cuenta->decrement('saldo', $transaccion->monto);
            } else {
                $cuenta->increment('saldo', $transaccion->monto);
            }

            $transaccion->delete();
        });

        return redirect()
            ->route('transacciones.index')
            ->with('success', 'Transacción eliminada y saldo actualizado.');
    }
}