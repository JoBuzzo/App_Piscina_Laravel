<?php

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
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

Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy')->middleware('admin');
Route::get('/reservas/adicionar', [ReservaController::class, 'adicionar'])->name('reservas.adicionar')->middleware('admin');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store')->middleware('admin');
Route::get('/reservas/{id}', [ReservaController::class, 'edit'])->name('reservas.ver')->middleware('admin');
Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update')->middleware('admin');
Route::get('/reservas', [ReservaController::class, 'reservas'])->name('reservas')->middleware('admin');
Route::put('/config', [ReservaController::class, 'config'])->name('config')->middleware('admin');
Route::get('/config', [ReservaController::class, 'viewConfig'])->name('viewConfig')->middleware('admin');
Route::get('/', [ReservaController::class, 'index'])->name('index')->middleware('admin');
Route::get('/perfil/{id}', [UserController::class, 'perfil'])->name('perfil')->middleware('admin');
Route::put('/perfil/{id}', [UserController::class, 'update'])->name('update.user')->middleware('admin');
Route::get('/admins', [UserController::class, 'admins'])->name('admins')->middleware('admin');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('admin');





