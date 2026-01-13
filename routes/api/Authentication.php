<?php

use App\Http\Controllers\api\AuthenticationController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthenticationController::class)
        ->group(function(){
            Route::post('/register','Register');
            Route::post('/login', 'Login');
            
        }
    );

Route::middleware("auth:sanctum")
        ->controller(AuthenticationController::class)
        ->group(function(){
            Route::get('/user',"User");
            Route::post('/logout',"Logout");
        }
    );