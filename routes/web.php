<?php

use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
Route::get('/reservas/adicionar', [ReservaController::class, 'adicionar'])->name('reservas.adicionar');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
Route::get('/reservas/{id}', [ReservaController::class, 'edit'])->name('reservas.ver');
Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update');
Route::get('/reservas', [ReservaController::class, 'reservas'])->name('reservas');
Route::post('/config', [ReservaController::class, 'config'])->name('config');
Route::get('/config', [ReservaController::class, 'viewConfig'])->name('viewConfig');
Route::get('/', [ReservaController::class, 'index'])->name('index');


Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');


Route::get('/login', function () {
    return view('login');
})->name('login');
