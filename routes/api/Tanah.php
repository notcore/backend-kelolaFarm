<?php

use App\Models\tanah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanahController;
use App\Http\Middleware\AdminMiddleware;


Route::prefix('tanah')->middleware("auth:sanctum")
    ->controller(TanahController::class)
    ->group(function () {
        Route::get('/', 'index');          
        Route::get('/{tanah}', 'show');   
    });

    
Route::prefix('tanah')->middleware("auth:sanctum", AdminMiddleware::class)
    ->controller(TanahController::class)
    ->group(function () {
        Route::post('/', 'store');     
        Route::put('/{tanah}', 'update'); 
        Route::delete('/{tanah}', 'destroy'); 
    });
