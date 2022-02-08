<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all()->sortBy('departure');

        return view('flights', ['flights' => $flights]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin_city_id' => 'required',
            'destination_city_id' => 'required',
            'company_id' => 'required',
            'departure' => 'required',
            'arrival' => 'required'
        ]);

        $flight = Flight::crete([
            'name' => $request->input(),
            'origin_city_id' => $request->input(),
            'destination_city_id' => $request->input(),
            'company_id' => $request->input(),
            'departure' => $request->input(),
            'arrival' => $request->input()
        ]);

        return $flight;
    }
}
