<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');

});
Route::post('/upload', [FileController::class, 'store'])->name('upload.store');
