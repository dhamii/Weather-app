<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function fetch(Request $request){
        $incomingField = $request->validate([
            'city'=> 'required'
        ]);
        
    $city = $request->city;
    }
}
