<?php

use App\Http\Controllers\LahanController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::middleware('auth:sanctum')
    ->controller(LahanController::class)
    ->group(function () {
        Route::get('/', 'index');    
        Route::get('/{lahan}', 'show');   
        Route::post('/', 'store');        
    });

Route::prefix('lahan')->middleware("auth:sanctum")
    ->controller(LahanController::class)
    ->group(function () {
        Route::put('/{lahan}', 'update'); 
        Route::delete('/{lahan}', 'destroy'); 
    });
