<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function show(City $city)
    {
        return view('city.show', [
            'city' => $city
        ]);
    }
}
