<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'saldo',
        'moneda',
    ];

    protected $casts = [
        'saldo' => 'decimal:2',
    ];

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }
}