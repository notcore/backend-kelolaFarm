<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
   public function getWeather(Request $request)
    {
        $request->validate([
            'lat' => 'required|numeric',
            'lon' => 'required|numeric',
        ]);

        $apiKey = env('OPENWEATHER_API_KEY');

        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'lat' => $request->lat,
            'lon' => $request->lon,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        return response()->json($response->json());
    }
}
