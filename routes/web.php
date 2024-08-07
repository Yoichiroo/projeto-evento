<?php

use App\Models\Evento;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/', [EventoController::class, 'index']);
Route::post('/eventos/join/{id}', [EventoController::class, 'joinEvent'])->middleware('auth');
Route::get('/dashboard', [EventoController::class, 'dashboard']) -> middleware('auth');


Route::get('/eventos/edit/{id}', [EventoController::class, 'edit'])->middleware('auth');
Route::get('/eventos/criar', [EventoController::class, 'criar']) -> middleware('auth');
Route::get('/eventos/{id}', [EventoController::class, 'show']);
Route::post('/eventos', [EventoController::class, 'store']);
Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->middleware('auth');  
Route::put('/eventos/update/{id}', [EventoController::class, 'update'])->middleware('auth');