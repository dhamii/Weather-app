<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function fetch(Request $request)
    {
        $incomingField = $request->validate([
            'city' => 'required'
        ]);

        $city = $request->city;
        $apiKey = env('WEATHERAPPAPIKEY');
        $response = Http::get('http://api.weatherapi.com/v1/current.json', [
            'key' => $apiKey,
            'q' => $city
        ]);
        $data = $response->json();
        if (isset($data['error'])) {
            return redirect('/')->withErrors(['error'=> $data['error']['message']]);
        }
        if (!isset($data['current']['temp_c']) || !isset($data['location']['name'])) {
            return redirect('/')->withErrors(['error' => 'Invalid response from API.']);
        }
        $datatemp = $data['current']['temp_c'];
        $datalocation = $data['location']['name'];
        // dd($data);
        // dd($datalocation);

        return view('resultview', compact(['datatemp', 'datalocation']))->withError(['notfound' => '']);
    }






    public function view()
    {
        return view('weatherview');
    }
}


