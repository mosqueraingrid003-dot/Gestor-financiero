<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\TransaccionController;

Route::middleware(['auth'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('cuentas', CuentaController::class);
    Route::resource('transacciones', TransaccionController::class)
    ->parameters(['transacciones' => 'transaccion']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});