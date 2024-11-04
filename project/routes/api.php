<?php

use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
Route::prefix('api')->group(function () {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/cadastrar', [UserController::class, 'store']);

    Route::middleware('auth:api')->group(function () {
        Route::prefix('/user')->group(function () {
            Route::put('/atualizar/{id}', [UserController::class, 'update']);
            Route::delete('/deletar/{id}', [UserController::class, 'destroy']);
            Route::get('/', [UserController::class, 'index']);
        });
        Route::prefix('/file')->group(function () {
            Route::post('/upload', [FileController::class, 'store'])->name('upload.store');
        });
    });
});







