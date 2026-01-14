<?php

use App\Models\harga;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HargaController;
use App\Http\Middleware\AdminMiddleware;


Route::prefix("harga")->middleware("auth:sanctum")
    ->controller(HargaController::class)
    ->group(function () {
        Route::get('/', 'index');          
        Route::get('/{harga}', 'show');   
    });


Route::prefix("harga")->middleware(["auth:sanctum", AdminMiddleware::class])
    ->controller(HargaController::class)
    ->group(function () {
        Route::post('/', 'store');     
        Route::put('/{harga}', 'update'); 
        Route::delete('/{harga}', 'destroy'); 
    });
