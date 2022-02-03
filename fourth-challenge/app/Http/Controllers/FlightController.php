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
        new Flight([
            'body' => $request->input('body')
        ]);
    }
}
