<?php

use App\Http\Controllers\api\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

foreach(glob(__DIR__ . "/api/*.php") as $file){
    require $file;
}