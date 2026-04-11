<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ponentesController;
use App\Http\Controllers\Api\AsistentesController;

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

// PONENTES CONTROLLER

// Recuperar todos los eventos de ponentes
Route::get('/ponentes', [ponentesController::class, 'index']);

// Crear un evento
Route::post('/ponentes', [ponentesController::class, 'store']);

// Recuperar un evento específico
Route::get('/ponentes/{id}', [ponentesController::class, 'show']);

// Actualizar un evento
Route::put('/ponentes/{id}', [ponentesController::class, 'update']);

// Eliminar un evento
Route::delete('/ponentes/{id}', [ponentesController::class, 'destroy']);

// ASISTENTES CONTROLLER

// Recuperar todos los eventos de asistentes
Route::get('/asistentes', [AsistentesController::class, 'index']);

// Crear un evento
Route::post('/asistentes', [AsistentesController::class, 'store']);

// Recuperar un evento específico
Route::get('/asistentes/{id}', [AsistentesController::class, 'show']);

// Actualizar un evento
Route::put('/asistentes/{id}', [AsistentesController::class, 'update']);

// Eliminar un evento
Route::delete('/asistentes/{id}', [AsistentesController::class, 'destroy']);