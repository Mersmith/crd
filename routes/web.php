<?php

use App\Http\Controllers\Web\InicioController;
use App\Http\Livewire\Sesion\Administrador\AdministradorIngresarLivewire;
use App\Http\Livewire\Sesion\Odontologo\OdontologoRegistrarLivewire;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', AdministradorIngresarLivewire::class)->name('inicio');

Route::get('registrar', OdontologoRegistrarLivewire::class)->name('regitrar.odontologo');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

