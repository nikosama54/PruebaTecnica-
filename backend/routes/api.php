<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoEstudianteController;

    Route::prefix('/materias')->group(function () {
        Route::get('/',[ MateriaController::class, 'get']);
        Route::post('/',[ MateriaController::class, 'create']);
        Route::get('/{id}',[ MateriaController::class, 'getById']);
        Route::put('/{id}',[ MateriaController::class, 'update']);
        Route::delete('/{id}',[ MateriaController::class, 'delete']);
    });

    Route::prefix('/cursos')->group(function () {
        Route::get('/',[ CursoController::class, 'get']);
        Route::post('/',[ CursoController::class, 'create']);
        Route::get('/{id}',[ CursoController::class, 'getById']);
        Route::put('/{id}',[ CursoController::class, 'update']);
        Route::delete('/{id}',[ CursoController::class, 'delete']);
    });

    Route::prefix('/estudiantes')->group(function () {
        Route::get('/',[ EstudianteController::class, 'get']);
        Route::post('/',[ EstudianteController::class, 'create']);
        Route::get('/{id}',[ EstudianteController::class, 'getById']);
        Route::put('/{id}',[ EstudianteController::class, 'update']);
        Route::delete('/{id}',[ EstudianteController::class, 'delete']);
    });

    Route::prefix('/profesores')->group(function () {
        Route::get('/',[ ProfesorController::class, 'get']);
        Route::post('/',[ ProfesorController::class, 'create']);
        Route::get('/{id}',[ ProfesorController::class, 'getById']);
        Route::put('/{id}',[ ProfesorController::class, 'update']);
        Route::delete('/{id}',[ ProfesorController::class, 'delete']);
    });

    Route::prefix('/notas')->group(function () {
        Route::get('/',[ NotaController::class, 'get']);
        Route::post('/',[ NotaController::class, 'create']);
        Route::get('/{materiaId}',[ NotaController::class, 'getByMateria']);
        Route::put('/{id}',[ NotaController::class, 'update']);
        Route::delete('/{id}',[ NotaController::class, 'delete']);
    });

    Route::prefix('/curso-estudiantes')->group(function () {
        Route::get('/',[ CursoEstudianteController::class, 'get']);
        Route::post('/inscribir',[ CursoEstudianteController::class, 'create']);
        Route::get('/{curso_id}',[ CursoEstudianteController::class, 'getByCurso']);
        Route::delete('/',[ CursoEstudianteController::class, 'destroy']);
    });

