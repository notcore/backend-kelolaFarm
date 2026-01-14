<?php

use App\Models\tanaman;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanamanController;
use App\Http\Middleware\AdminMiddleware;


Route::prefix('daerah')->middleware("auth:sanctum")
    ->controller(TanamanController::class)
    ->group(function () {
        Route::get('/', 'index');          
        Route::get('/{tanaman}', 'show');   
    });

    
Route::prefix("daerah")->middleware(["auth:sanctum", AdminMiddleware::class])
    ->controller(TanamanController::class)
    ->group(function () {
        Route::post('/', 'store');     
        Route::put('/{tanaman}', 'update'); 
        Route::delete('/{tanaman}', 'destroy'); 
    });
