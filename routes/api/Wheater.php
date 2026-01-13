<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;


Route::middleware('auth:sanctum')
    ->get('/weather', [WeatherController::class, 'index']);
