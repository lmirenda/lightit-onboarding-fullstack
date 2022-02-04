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

    public function store(Flight $flight, Request $request)
    {
        $request->validate([
            'origin_city_id' => 'required',
            'destination_city_id' => 'required',
            'company_id' => 'required',
            'departure' => 'required',
            'arrival' => 'required'
        ]);
        // TODO:
        // $flight->create([
        //     'origin_city_id' => input(),
        //     'destination_city_id' => input(),
        //     'company_id' => input(),
        //     'departure' => input(),
        //     'arrival' => input()
        // ]);
    }
}
