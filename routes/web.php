<?php

use App\Models\Evento;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ContatoController;

Route::get('/', [EventoController::class, 'index']);

Route::get('/eventos/criar', [EventoController::class, 'criar']);

Route::get('/eventos/{id}', [EventoController::class, 'show']);

Route::post('/eventos', [EventoController::class, 'store']);

Route::get('/contact', function () {
    return view('contact');
});

