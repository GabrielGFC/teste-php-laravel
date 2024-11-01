<?php

use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::post('/cadastrar', [UserController::class, 'store']);
Route::put('/atualizar/{id}', [UserController::class, 'update']);
Route::delete('/deletar/{id}', [UserController::class, 'destroy']);
Route::get('/', [UserController::class, 'index']);

Route::post('/upload', [FileController::class, 'store'])->name('upload.store');


