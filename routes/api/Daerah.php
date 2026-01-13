<?php

use App\Models\Daerah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaerahController;
use App\Http\Middleware\AdminMiddleware;


Route::middleware("auth:sanctum")
    ->controller(DaerahController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{daerah}', 'show');
    });

Route::middleware(["auth:sanctum", AdminMiddleware::class])
    ->controller(DaerahController::class)
    ->group(function () {
        Route::post('/', 'store');
        Route::put('/{daerah}', 'update');
        Route::delete('/{daerah}', 'destroy');
    });
