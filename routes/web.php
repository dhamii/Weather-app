<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/view', [WeatherController::class, 'view']);
Route::post('/fetch', [WeatherController::class, 'fetch']);