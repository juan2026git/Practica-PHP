<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;

// Recuperar todos los eventos
Route::get('/events', [EventController::class, 'index']);

// Crear un evento
Route::post('/events', [EventController::class, 'store']);

// Recuperar un evento específico
Route::get('/events/{id}', [EventController::class, 'show']);

// Actualizar un evento
Route::put('/events/{id}', [EventController::class, 'update']);

// Eliminar un evento
Route::delete('/events/{id}', [EventController::class, 'destroy']);