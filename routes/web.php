<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/reservas/pdf', [ReservaController::class, 'exportar'])->name('reservas.pdf');
Route::resource('reservas', 'App\Http\Controllers\ReservaController');
Route::resource('despesas', 'App\Http\Controllers\DespesasController');

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/perfil/editar', [UserController::class, 'edit'])->name('users.edit');
Route::put('/perfil/editar/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');