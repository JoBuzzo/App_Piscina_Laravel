<?php

use App\Http\Controllers\DespesasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//                                      RESERVAS
Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy')->middleware('admin');
Route::get('/reservas/adicionar', [ReservaController::class, 'create'])->name('reservas.create')->middleware('admin');
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store')->middleware('admin');
Route::get('/reservas/{id}', [ReservaController::class, 'edit'])->name('reservas.edit')->middleware('admin');
Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update')->middleware('admin');
Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index')->middleware('admin');

//                                      CONFIG
Route::put('/config', [ReservaController::class, 'config'])->name('config')->middleware('admin');
Route::get('/config', [ReservaController::class, 'viewConfig'])->name('viewConfig')->middleware('admin');

Route::get('/', [HomeController::class, 'home'])->name('home')->middleware('admin');

//                                      PERFIL/ADMIN
Route::get('/perfil/{id}', [UserController::class, 'perfil'])->name('perfil')->middleware('admin');
Route::put('/perfil/{id}', [UserController::class, 'update'])->name('update.user')->middleware('admin');
Route::get('/admins', [UserController::class, 'admins'])->name('admins')->middleware('admin');

//                                      DESPESAS
Route::delete('/despesas/{id}', [DespesasController::class, 'destroy'])->name('despesas.destroy')->middleware('admin');
Route::get('/despesas/adicionar', [DespesasController::class, 'create'])->name('despesas.create')->middleware('admin');
Route::post('/despesas', [DespesasController::class, 'store'])->name('despesas.store')->middleware('admin');
Route::get('/despesas/{id}', [DespesasController::class, 'edit'])->name('despesas.edit')->middleware('admin');
Route::put('/despesas/{id}', [DespesasController::class, 'update'])->name('despesas.update')->middleware('admin');
Route::get('/despesas', [DespesasController::class, 'index'])->name('despesas.index')->middleware('admin');



//                                      AUTH
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('admin');